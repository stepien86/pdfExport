<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;



// class PostsExport implements FromCollection
// {
//     use Exportable;
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return Post::all();
//     }
// }
class PostsExport implements FromView,ShouldAutoSize

{
    use Exportable;
    public function view(): View
    {
        return view('exports.export', [
            'posts' => Post::all()
        ]);
    }
}
