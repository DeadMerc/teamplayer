<?php

namespace App\Http\Controllers;

use App\Team_galery;
use Illuminate\Http\Request;

use App\Http\Requests;

class GalleryController extends Controller
{
    /**
     * @api {post} /v1/galery/upload uploadImages
     * @apiVersion 0.1.0
     * @apiName uploadImages
     * @apiGroup Galery
     * @apiDescription uploadImages
     *
     * @apiHeader {string} token
     *
     * @apiParam {array} image Массив картинок
     * @apiParam {int} team_id ID команду, в чью галерею загружаем
     *
     */
    public function upload(Request $request) {
        $rules = [ 'team_id' => 'numeric|required|exists:teams,id' ];
        $valid = Validator($request->all(), $rules);
        if (!$valid->fails()) {
            $count = 0;
            $info = [ ];
            foreach ($request->allFiles() as $images) {
                foreach ($images as $image) {
                    if ($image->getMimeType() == 'image/jpeg' and $image->getSize() < 10000000) {
                        $fileName = md5(rand(999, 99999) . date('d m Y')) . '.jpg';
                        $image->move(storage_path() . '/app/public/images', $fileName);
                        $photo = new Team_galery;
                        $photo->team_id = (int)$request->team_id;
                        $photo->image = $fileName;
                        //$photo->upload_at = date('now');
                        $photo->save();
                        unset($photo);
                        $count++;
                    } else {
                        $info[] = $image->getFilename() . ' have errors, bad type or many size:' . $image->getSize();
                    }

                }
            }
            return $this->helpReturn('Saved ' . $count . ' photos for team: ' . $request->team_id, $info);
        } else {
            return $this->helpError('valid', $valid);
        }
    }
}
