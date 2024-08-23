<?php

use App\Models\Area;
use Cloudinary\Cloudinary;
use App\Models\RequirementType;






//cloud-picture-upload-function
function cloudUpload($file, $folder, $old)
{
    if ($old) {
        $token = explode('/', $old);
        $token2 = explode('.', end($token));
        cloudinary()->destroy('newFolder/' . $folder . '/' . $token2[0]);
    }

    // Determine the resource type and file extension
    $resourceType = 'image';
    $extension = $file->getClientOriginalExtension(); // Get the original extension

    if (strpos($file->getMimeType(), 'video') !== false) {
        $resourceType = 'video';
    } elseif ($file->getMimeType() === 'application/pdf') {
        $resourceType = 'raw';
    }

    // Upload the file with the appropriate resource type and extension
    $response = cloudinary()->upload($file->getPathname(), [
        'folder' => 'newFolder/' . $folder,
        'resource_type' => $resourceType,
        'public_id' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME), // Use the original file name without the extension
        'transformation' => [
            'quality' => 'auto',
        ],
        'format' => $extension // Ensure the correct extension is used
    ])->getSecurePath();

    return $response;
}



if (!function_exists('mysql_escape')) {
    function mysql_escape($inp)
    {
        if (is_array($inp)) return array_map(__METHOD__, $inp);

        if (!empty($inp) && is_string($inp)) {
            return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
        }

        return $inp;
    }
}

function getrequirementtypename($id)
{
    $data = RequirementType::find($id);
    if ($data) {
        return $data->name;
    }
}

function getrequirementtype_multiple_names($array)
{
    $array = $array->toArray();
    $requirementTypeIds = [];
    foreach ($array as $item) {
        if (isset($item["requirement_types_id"])) {
            $requirementTypeIds[] = $item["requirement_types_id"];
        }
    }
    $data = RequirementType::whereIn("id", $requirementTypeIds)->get();
    $name = "";
    foreach ($data as $key) {
        $name .= $key->name . " / ";
    }
    return  rtrim($name, " / ");
}



function getAreaname($id)
{
    $data = Area::find($id);
    if ($data) {
        return $data->name;
    }
}
