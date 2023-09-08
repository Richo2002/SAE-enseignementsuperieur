<?php

namespace App\Http\Controllers;

use ZipArchive;
use App\Models\File;
use App\Models\Archive;
use App\Models\Service;
use App\Models\Direction;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArchiveController extends Controller
{
    public function index()
    {
        //recupérer toutes les archives
        $allArchives = Archive::all();

        // Filtrer les archives appartenant au département de l'utilisateur connecté
        $userDepartment = Department::findOrFail(intval(Auth::user()->department_id));

        $filteredArchives = [];//conteneur des archives filtrées
        foreach ($allArchives as $archive)
        {
            if ($archive->department_id == $userDepartment->id)
            {
                $filteredArchives[] = $archive;
            }
        }

        return view('archives.archiviste', [
            'filteredArchives' => $filteredArchives
        ]);
    }


    public function create()
    {
        $filingPlan = Direction::all();
        return view('archives.new-archive', [
            'filingPlan' => $filingPlan
        ]);
    }

    public function store(Request $request)
    {

        $department = Department::findOrFail(intval(Auth::user()->department_id));

        $find_call_number = Archive::where('call_number', $request->call_number)->first();

        if($find_call_number != null)
        {
            return redirect()->route('archives.index')->withErrors(['message' => 'Enregistrement non effectué car cette archive a déjà été enregistrée.']);
        }
        else
        {

            $archive = Archive::create([
                'call_number' => $request->call_number,
                'project' => $request->project,
                'analyze' => $request->analyze,
                'piece' => $request->piece,
                'tenderer' => $request->tenderer,
                'extreme_date' => $request->extreme_date,
                'observation' => $request->observation,
                'duree' => $request->duree,
                'final_sort' => $request->final_sort,

                'service_id' => $request->service_id,
                'department_id' =>$department->id,
            ]);

            $form_files = $request->file('myfiles');
            $folder = 'archives/'.Str::lower($department->name).'/'.$request->call_number;
            $folder = str_replace(' ', '_', $folder);

            $allfiles = [];
            $allNames = [];

            foreach($form_files as $myfile)
            {
                //récupérer les noms originaux des fichiers
                $allNames[] = $myfile->getClientOriginalName();

                //stocker les fichiers sur le serveur
                $path_image = Storage::putFile('public/'.$folder, $myfile);
                $path_image_convert_to_table = explode('/', $path_image);

                $allfiles[] = $path_image_convert_to_table;
            }

            for($i = 0; $i < count($allfiles); $i++)
            {
                //enregistrement des fichiers dans la base de données
                $newFile = File::create([
                    'path' => end($allfiles[$i]),
                    'basename' => $allNames[$i],
                    'archive_id' => $archive->id,
                ]);
            }

            return redirect()->route('archives.index');
        }
    }

    //fonction de recherche par un archiviste
    public function search(Request $request)
    {
        $search_field = $request->searchBy;
        $search_value = $request->searchValue;
        $start_date = $request->dateDebut;
        $end_date = $request->dateEnd;

        //faire des requêtes pour sélectionner les archives selon des critères
        if ($search_value && $search_field === 'child_name')
        {
            $query = Archive::whereHas('service', function($query) use ($search_value) {
                 $query->where('name', 'LIKE', "%$search_value%");
            });
        }
        else if($search_value && $search_field === 'parent_name')
        {
            $query = Archive::whereHas('service.direction', function($query) use ($search_value) {
                $query->where('name', 'LIKE', "%$search_value%");
            });
        }
        else if($search_value && $search_field != 'child_name' && $search_field != 'parent_name')
        {
           $query = Archive::where($search_field, 'LIKE', "%$search_value%");
        }
        else
        {
            $query = Archive::query();
        }

        if ($start_date && $end_date) {
            $query->whereRaw('DATE_ADD(created_at, INTERVAL duree YEAR) > ?', [$start_date]);
            $query->whereRaw('DATE_ADD(created_at, INTERVAL duree YEAR) < ?', [$end_date]);
        }
        else if($start_date && !$end_date)
        {
            $query->whereRaw('DATE_ADD(created_at, INTERVAL duree YEAR) > ?', [$start_date]);
        }
        else if($end_date && !$start_date)
        {
            $query->whereRaw('DATE_ADD(created_at, INTERVAL duree YEAR) < ?', [$end_date]);
        }

        $results = $query->get();

         // Filtrer les archives appartenant au département de l'utilisateur connecté
         $userDepartment = Department::findOrFail(intval(Auth::user()->department_id));

         $filteredArchives = [];
         foreach ($results as $archive)
         {
             if ($archive->department_id == $userDepartment->id)
             {
                 $filteredArchives[] = $archive;
             }
         }

        return view('archives.archiviste', [
            'filteredArchives' => $filteredArchives
        ]);
    }

    public function manageArchives()
    {
        $archives = Archive::all();

        return view('super-admin.gestion-archives', [
            'archives' => $archives
        ]);
    }


    //fonction de recherche par l'administrateur
    public function adminSearch(Request $request)
    {
        $search_field = $request->searchBy;
        $search_value = $request->searchValue;
        $start_date = $request->dateDebut;
        $end_date = $request->dateEnd;

        //faire des requêtes pour sélectionner les archies selon des critères
        if ($search_value && $search_field === 'child_name')
        {
            $query = Archive::whereHas('service', function($query) use ($search_value) {
                 $query->where('name', 'LIKE', "%$search_value%");
            });
        }
        else if($search_value && $search_field === 'parent_name')
        {
            $query = Archive::whereHas('service.direction', function($query) use ($search_value) {
                $query->where('name', 'LIKE', "%$search_value%");
            });
        }
        else if($search_value && $search_field === 'department_name')
        {
            $query = Archive::whereHas('department', function($query) use ($search_value) {
                $query->where('name', 'LIKE', "%$search_value%");
           });
        }
        else if($search_value && $search_field != 'child_name' && $search_field != 'parent_name' && $search_field != 'department_name')
        {
           $query = Archive::where($search_field, 'LIKE', "%$search_value%");
        }
        else
        {
            $query = Archive::query();
        }

        if ($start_date && $end_date) {
            $query->whereRaw('DATE_ADD(created_at, INTERVAL duree YEAR) > ?', [$start_date]);
            $query->whereRaw('DATE_ADD(created_at, INTERVAL duree YEAR) < ?', [$end_date]);
        }
        else if($start_date && !$end_date)
        {
            $query->whereRaw('DATE_ADD(created_at, INTERVAL duree YEAR) > ?', [$start_date]);
        }
        else if($end_date && !$start_date)
        {
            $query->whereRaw('DATE_ADD(created_at, INTERVAL duree YEAR) < ?', [$end_date]);
        }

        $archives = $query->get();

        return view('super-admin.gestion-archives', [
            'archives' => $archives
        ]);
    }

    public function viewFiles(Archive $archive)
    {
        $files = File::where('archive_id', $archive->id)->get();

        if(count($files))
        {
            return view('archives.view-files', [
                'files' => $files,
                'archive' =>$archive
            ]);
        }
        else
        {
            if(Auth::user()->type == "Archiviste")
            {
                    return redirect()->route('archives.index')->withErrors(['message' => 'Impossible de visualiser cette archive car elle  ne contient aucun fichier.']);
            }
            else
            {
                return redirect()->route('archives.mngt')->withErrors(['message' => 'Impossible de visualiser cette archive car elle  ne contient aucun fichier.']);
            }
        }
    }

    public function viewPDF(File $file)
    {
        $road_to_file = str::lower($file->archive->department->name).'/'.$file->archive->call_number.'/'.$file->path;
        $road_to_file = str_replace(' ', '_', $road_to_file);

        $filePath = public_path('storage/archives/').$road_to_file;
        $headers = ['Content-Type: application/pdf'];
        if (file_exists($filePath))
        {
            return response()->file($filePath, $headers);
        }
        else
        {
            return redirect()->back()->withErrors(['message' => 'Impossible de visualiser ce fichier car le chemin vers ce celui-ci n\'existe plus.']);
        }
    }


    public function toDownload(Archive $archive)
    {
        $files = [];
        $names = [];
        $files_to_download = File::where('archive_id', $archive->id)->get();

        foreach($files_to_download as $file)
        {
            $road_to_file = str::lower($archive->department->name).'/'.$archive->call_number.'/'.$file->path;
            $road_to_file = str_replace(' ', '_', $road_to_file);

            $path = public_path('storage/archives/').$road_to_file;

            $files[] = $path;
            $names[] = $file->basename;
        }

        $zipFileName = 'archive_' . $archive->id . '.zip';
        $zipPath = storage_path('app/' . $zipFileName);

        $zip = new ZipArchive;

        if (!empty($files) && $zip->open($zipPath, ZipArchive::CREATE) === true)
        {
            $nbfile=0;
            for($i = 0; $i < count($files); $i++)
            {
                if(file_exists($files[$i]))
                {
                    $zip->addFile($files[$i], $names[$i]);
                    $nbfile++;
                }
            }
            $zip->close();

            if($nbfile != 0)
            {
                return response()->download($zipPath)->deleteFileAfterSend(true);
            }
            else
            {
                if(Auth::user()->type == "Archiviste")
                {
                    return redirect()->route('archives.index')->withErrors(['message' => 'Impossible de télécharger cette archive car elle  ne contient aucun fichier.']);
                }
                else
                {
                    return redirect()->route('archives.mngt')->withErrors(['message' => 'Impossible de télécharger cette archive car elle  ne contient aucun fichier.']);
                }
            }

        }
        else
        {
            if(Auth::user()->type == "Archiviste")
            {
                return redirect()->route('archives.index')->withErrors(['message' => 'Impossible de télécharger cette archive car elle  ne contient aucun fichier.']);
            }
            else
            {
                return redirect()->route('archives.mngt')->withErrors(['message' => 'Impossible de télécharger cette archive car elle  ne contient aucun fichier.']);
            }
        }
    }

    public function statistics()
    {
        return view('super-admin.statistics-maker');
    }


    public function getStatsBy(Request $request)
    {
        $stats_field = $request->statsBy;

        $archives = Archive::all();
        $number_archives = [];
        $stats_values = [];

        if($stats_field === 'department')
        {
            $departments = Department::all();
            foreach($departments as $department)
            {
                $count = 0;
                foreach($archives as $archive)
                {
                    if($archive->department_id == $department->id)
                    {
                        $count += 1;
                    }
                }
                $number_archives[] = $count;
            }
            $stats_values = $departments;
            $statsBy = 'direction';
        }
        else if($stats_field === 'serie')
        {
            $series = Direction::all();
            foreach($series as $serie)
            {
                $count = 0;
                foreach($archives as $archive)
                {
                    if($archive->service->direction->id == $serie->id)
                    {
                        $count += 1;
                    }
                }
                $number_archives[] = $count;
            }
            $stats_values = $series;
            $statsBy = 'série';
        }
        else
        {
            $subSeries = Service::whereNotNull('direction_id')->get();
            foreach($subSeries as $subSerie)
            {
                $count = 0;
                foreach($archives as $archive)
                {
                    if($archive->service_id == $subSerie->id)
                    {
                        $count += 1;
                    }
                }
                $number_archives[] = $count;
            }
            $stats_values = $subSeries;
            $statsBy = 'sous-série';
        }

        return view('super-admin.rapports-statistiques', [
            'statsBy' => $statsBy,
            'stats_values' => $stats_values,
            'number_archives' => $number_archives
        ]);
    }

}
