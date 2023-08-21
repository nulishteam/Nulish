<?php

namespace App\View\Components\navbars\navs;

use Illuminate\View\Component;

class landingnav extends Component
{
    public string $pesan = "Pesan"; // variable yang dikirim ke view
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        //$this->pesan = "Pesan dari Controller";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navbars.navs.landingnav');
    }
}
