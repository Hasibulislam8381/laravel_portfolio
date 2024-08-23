<?php

namespace App\Http\Controllers\Backend;

use DataTables;
use App\Models\Area;
use App\Models\SubArea;
use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PropertyStore;
use App\Models\RequirementType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $activeProperty = Property::where('status', 'publish')->paginate(10);

        if (request()->ajax()) {
            $status = $request->input('status');
            $data = Property::query();
            if ($status === 'trash') {
                $data->onlyTrashed();
            } else {
                $data->where('status', $status);
            }
            return DataTables::of($data)
                ->addColumn('action', function ($data) use ($status) {
                    if ($status === 'publish') {
                        return '<a href="' . route('backend.properties.edit', ['properties' => $data->id]) . '" class="btn btn-sm btn-info">Edit</a>
                        <a href="' . route('backend.properties.status', $data->id) . '"
                        class="btn btn-sm btn-warning">Draft</a>
                        <a href="' . route('backend.properties.trash', $data->id) . '"
                        class="btn btn-sm btn-danger">Trash</a>';
                        // Trashed property, show Restore and Delete buttons

                    } elseif ($status === 'draft') {
                        // Draft property, show Publish, Edit, and Trash buttons
                        return '<a href="#" class="btn btn-sm btn-info">Edit</a>
                            <a href="' . route('backend.properties.status', $data->id) . '"
                            class="btn ' . ($data->status == 'publish' ? 'btn-warning' : 'btn-success') . '">' . ($data->status == 'publish' ? 'Draft' : 'Publish') . '</a>
                            <a href="' . route('backend.properties.trash', $data->id) . '"
                            class="btn btn-sm btn-danger">Trash</a>';
                    } else {

                        return '<a href="' . route('backend.properties.reStore', $data->id) . '"
                            class="btn btn-sm btn-success">Restore</a>
                            <form action="' . route('backend.properties.delete', $data->id) . '" method="POST" class="delete_form">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button type="submit" class="btn btn-sm btn-danger"  style="margin-top: 5px;" 
                                    onclick="return confirm(\'Are you Sure to Delete?\')">Delete</button>
                            </form>';
                    }
                })
                // ->orderBy('id', 'desc')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.property.index', compact('activeProperty'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $area = Area::get();
        $subarea = SubArea::get();
        $requirementType = RequirementType::whereNull('parent_id')->get();
        $childType = RequirementType::whereNotNull('parent_id')->get();
        return view('backend.property.create', compact('requirementType', 'childType', 'area', 'subarea'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'bedroom' => 'nullable',
            'bathroom' => 'nullable',
            'garage' => 'nullable',
            'year_built' => 'nullable',
            'property_size' => 'nullable',
            'property_purpose' => 'nullable',
            'interior' => 'nullable',
            'balcony' => 'nullable',
            'registration_type' => 'nullable',
            'parking' => 'nullable',
            'house_rules' => 'nullable',
            'lift' => 'nullable',
            'front_road_size' => 'nullable',
            'floor' => 'nullable',
            'common_area' => 'nullable',
            'unit' => 'nullable',
            'nearby_landmark' => 'nullable',
            'unit_per_floor' => 'nullable',
            'preferred_tenant' => 'nullable',
            'total_units' => 'nullable',
            'gas' => 'nullable',
            'price' => 'nullable',
            'servant_room' => 'nullable',
            'servant_washroom' => 'nullable',
            'service_charge' => 'nullable',
            'apartment_facing' => 'nullable',
            'garage_size' => 'nullable',
            'property_id' => 'nullable',
            'address' => 'nullable',
            'city' => 'nullable',
            'zip_code' => 'nullable',
            'area' => 'nullable',
            'country' => 'nullable',
            'features' => 'nullable',
            'tags' => 'nullable',
        ]);
        $photo = $request->file('photo');
        $feature_photo = $request->file('feature_photo');
        $meta_photo = $request->file('meta_photo');
        // if ($photo) {
        //     $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
        //     Image::make($photo)->save(public_path('storage/blog/' . $photoName));
        // }
        $images = [];
        if ($photo) {

            foreach ($photo as $photos) {
                $folder = 'property';
                $response = cloudUpload($photos, $folder, null);
                $images[] = $response;
            }
        }
        $images = implode(";", $images);

        if ($meta_photo) {
            $folder = 'property';
            $response = cloudUpload($meta_photo, $folder, null);
            $meta_photo = $response;
        }
        if ($feature_photo) {
            $folder = 'property';
            $response = cloudUpload($feature_photo, $folder, null);
            $feature_photo = $response;
        }


        $propertyData = Property::create([
            'area_id' => 1,
            'sub_area_id' => $request->sub_area_id,

            'title' => $request->title,
            'photo' => $images,
            'feature_photo' => $feature_photo,
            'meta_photo' => $meta_photo,
            'alt_text' => $request->alt_text,
            'bedroom' => $request->bedroom,
            'bathroom' => $request->bathroom,
            'garage' => $request->garage,
            'year_built' => $request->year_built,
            'property_size' => $request->property_size,
            'property_purpose' => $request->property_purpose,
            'interior' => $request->interior,
            'balcony' => $request->balcony,
            'registration_type' => $request->registration_type,
            'parking' => $request->parking,
            'house_rules' => $request->house_rules,
            'lift' => $request->lift,
            'front_road_size' => $request->front_road_size,
            'floor' => $request->floor,
            'common_area' => $request->common_area,
            'unit' => $request->unit,
            'nearby_landmark' => $request->nearby_landmark,
            'unit_per_floor' => $request->unit_per_floor,
            'preferred_tenant' => $request->preferred_tenant,
            'total_units' => $request->total_units,
            'gas' => $request->gas,
            'price' => $request->price,
            'servant_room' => $request->servant_room,
            'servant_washroom' => $request->servant_washroom,
            'service_charge' => $request->service_charge,
            'apartment_facing' => $request->apartment_facing,
            'garage_size' => $request->garage_size,
            'property_id' => $request->property_id,
            'address' => $request->address,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'area' => $request->area,
            'country' => $request->country,
            'features' => $request->features,
            'tags' => $request->tags,
            'slug' => Str::slug($request->title),
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,

        ]);

        if ($propertyData) {
            $propertyType = [];
            if ($request->requirement_types_id) {
                foreach ($request->requirement_types_id as $id) {
                    $propertyType[] = $id;
                }
            }
            // $propertyType = implode(",", $propertyType);
            foreach ($propertyType as $data) {
                PropertyStore::create([
                    'requirement_types_id' => $data,
                    'property_id' => $propertyData->id
                ]);
            }
        }

        return back()->with('success', 'Property Added Successfully!');
    }

    /**
     *preview modal using ajax
     */





    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $properties)
    {
        $propertytik = Property::with(['requirement'])->where('id', $properties->id)->firstOrFail();
        $area = Area::get();
        $subarea = SubArea::get();
        $requirementType = RequirementType::whereNull('parent_id')->get();
        $childType = RequirementType::whereNotNull('parent_id')->get();
        return view("backend.property.edit", compact('propertytik', 'properties', 'requirementType', 'childType', 'area', 'subarea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $properties, PropertyStore $propertyStore)
    {
        $request->validate([
            'title' => 'nullable',

        ]);
        $photo = $request->file('photo');

        $hidden_image = $request->image;


        if ($request->has('meta_photo')) {
            $folder = 'property';
            $response = cloudUpload($request->meta_photo, $folder, $properties->meta_photo);
            $properties->meta_photo = $response;
        }
        if ($request->has('feature_photo')) {
            $folder = 'property';
            $response = cloudUpload($request->feature_photo, $folder, $properties->feature_photo);
            $properties->feature_photo = $response;
        }

        $images = [];
        if ($request->has('photo')) {
            if ($photo) {
                foreach ($photo as $photos) {
                    $folder = 'property';
                    $response = cloudUpload($photos, $folder, null);
                    $images[] = $response;
                }
            }
        }


        $images = implode(";", $images);
        if (is_array($hidden_image)) {
            $hidden_image = implode(";", $hidden_image);
        }
        if ($images) {
            $images .= ";";
        }
        $allphoto = $images . $hidden_image;
        $allphoto = rtrim($allphoto, ";");

        $properties->update([
            'area_id' => 1,
            'sub_area_id' => $request->sub_area_id,

            'title' => $request->title,
            'photo' => $allphoto,
            'meta_photo' => $properties->meta_photo,
            'feature_photo' => $properties->feature_photo,
            'alt_text' => $request->alt_text,
            'bedroom' => $request->bedroom,
            'bathroom' => $request->bathroom,
            'garage' => $request->garage,
            'year_built' => $request->year_built,
            'property_size' => $request->property_size,
            'property_purpose' => $request->property_purpose,
            'interior' => $request->interior,
            'balcony' => $request->balcony,
            'registration_type' => $request->registration_type,
            'parking' => $request->parking,
            'house_rules' => $request->house_rules,
            'lift' => $request->lift,
            'front_road_size' => $request->front_road_size,
            'floor' => $request->floor,
            'common_area' => $request->common_area,
            'unit' => $request->unit,
            'nearby_landmark' => $request->nearby_landmark,
            'unit_per_floor' => $request->unit_per_floor,
            'preferred_tenant' => $request->preferred_tenant,
            'total_units' => $request->total_units,
            'gas' => $request->gas,
            'price' => $request->price,
            'servant_room' => $request->servant_room,
            'servant_washroom' => $request->servant_washroom,
            'service_charge' => $request->service_charge,
            'apartment_facing' => $request->apartment_facing,
            'garage_size' => $request->garage_size,
            'property_id' => $request->property_id,
            'address' => $request->address,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'area' => $request->area,
            'country' => $request->country,
            'features' => $request->features,
            'tags' => $request->tags,
            'slug' => $request->slug,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,
        ]);
        //   Update PropertyStore
        $propertyType = [];
        if ($request->requirement_types_id) {
            foreach ($request->requirement_types_id as $id) {
                $propertyType[] = $id;
            }
        }

        $properties->porpertystore()->forceDelete(); // Delete old related records
        // Delete old related records

        foreach ($propertyType as $data) {
            PropertyStore::create([
                'requirement_types_id' => $data,
                'property_id' => $properties->id
            ]);
        }
        //   Update PropertyStore
        return redirect(route('backend.properties.index'))->with('success', 'Property  Edit Successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $properties)
    {
        //
        $properties->status == 'draft';
        $properties->save();
        $properties->delete();
        return back()->with('success', 'Property Trashed');
    }
    public function sub_areaAjax($slug)
    {


        $cacheKey = 'api_' . $slug;

        $area = Cache::remember($cacheKey, 60, function () use ($slug) {
            return SubArea::where('area_id', $slug)->get();
        });

        return view('backend.property.partial.sub_area_row', compact('area'));
    }
    public function status(Property $properties)
    {
        if ($properties->status == 'publish') {
            $properties->status = 'draft';
            $properties->save();
        } else {
            $properties->status = 'publish';
            $properties->save();
        }
        return back()->with('success', $properties->status == 'publish' ? 'property  info Published' : 'property Info Drafted');
    }
    public function reStore($id)
    {
        $property = Property::onlyTrashed()->find($id);
        $property->restore();
        return back()->with('success', 'Property Restored');
    }
    public function permDelete($id)
    {
        $property = Property::onlyTrashed()->find($id);
        $property->forceDelete();
        return back()->with('success', 'Property Deleted');
    }
}
