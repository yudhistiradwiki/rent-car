<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Berita;
use App\Models\Carousel;
use App\Models\Client;
use App\Models\Facility;
use App\Models\Project;
use App\Models\Services;
use App\Models\Struktur;
use App\Models\Testimoni;
use App\Models\VisiMisi;
use App\Models\Whychoose;
use App\Models\whychooseDetail;

class LandingPageController extends Controller
{

    /**
     * index
     *
     * @return void
     */
    public function index()
    {


        return view('pages.landingPage.index');
    }

}
