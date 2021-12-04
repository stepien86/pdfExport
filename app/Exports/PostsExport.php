<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Symfony\Component\HttpFoundation\Response;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Symfony\Component\HttpFoundation\BinaryFileResponse;


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
class PostsExport implements FromQuery, ShouldAutoSize, WithStyles, Responsable

{
    use Exportable;

    private string $filename = 'posts.pdf';
    private string $writerType = Excel::MPDF;
    private Post $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }


    public function toResponse($request): \Illuminate\Http\Response|BinaryFileResponse|Response
    {
        return $this->download($this->filename, $this->writerType);
    }

    public function styles(Worksheet $sheet)
    {
        $cellCoordinates = 'A1:C'.$this->query()->count();
//        $cellCoordinates = 'A1:C3';
        $sheet->getStyle($cellCoordinates)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color'       => ['argb' => '000000'],
                ],
            ],
        ]);
    }

    public function query()
    {
        return $this->post->newQuery()->select(['id', 'title', 'text']);
    }
}
