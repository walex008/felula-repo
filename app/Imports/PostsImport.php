<?php

namespace App\Imports;


use App\Models\Post;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class PostsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {

            if(empty($row->category_id)) {
//                dd($row);
                $data = [
                    'title'=>$row['title'],
                    'description'=> $row['description'],
                    'user_id' => $row['user_id'],
                    'content' => $row['content'],
                    'image' => $row['image_name'],
                    'category_id' =>$row['category_id']
                ];
                Post::create($data);
            }


        }
    }



}
