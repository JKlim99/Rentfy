@extends('tenant.public')
@section('title', 'Property Details')
@section('content')

<section class="main container" id="dashboard">
    <div>
        <div class="text-center">
            <h2>Property Details</h2>
            <h5 class="text-muted mb-3">Hi {{ucfirst($user->first_name)}}</h5>
        </div>
        <div class="d-flex justify-content-center mb-4">
            <a type="button" class="btn btn-outline-primary ms-1" href="/dashboard">Dashboard</a>
            <a type="button" class="btn btn-primary ms-1" href="/manage/property">Manage Properties</a>
            <a type="button" class="btn btn-outline-primary ms-1" href="/manage/service">Manage Repair Services</a>
            <a type="button" class="btn btn-outline-primary ms-1" href="/rental">View Rental</a>
        </div>
        <div class="mb-4">
            <a onclick="history.back()" class="button">Back</a>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        Property #{{$property->id}} <a href="/property/{{$property->id}}">view page</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/properties/{{$property->id}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Property Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Property Name *" value="{{old('name', $property->name)}}" required/>    
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Building Type</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <input type="text" id="building_type" name="building_type" class="form-control" placeholder="Building Type *" value="{{old('building_type', $property->building_type)}}" required/>    
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Land Size</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <input type="text" id="area_size" name="area_size" class="form-control" placeholder="Land Size *" value="{{old('area_size', $property->area_size)}}" required/>
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Address 1</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <input type="text" id="address1" name="address1" class="form-control" placeholder="Address 1 *" value="{{old('address1', $property->address1)}}" required/>    
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Address 2</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <input type="text" id="address2" name="address2" class="form-control" placeholder="Address 2 *" value="{{old('address2', $property->address2)}}"/>    
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">City</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <input type="text" id="city" name="city" class="form-control" placeholder="City*" value="{{old('city', $property->city)}}" required/>       
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Postcode</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <input type="text" id="postcode" name="postcode" class="form-control" placeholder="Postcode *" value="{{old('postcode', $property->postcode)}}" required/>       
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">State</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <input type="text" id="state" name="state" class="form-control" placeholder="State *" value="{{old('state', $property->state)}}" required/>          
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Country</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <input type="text" id="country" name="country" class="form-control" placeholder="Country *" value="{{old('country', $property->country)}}" required/>       
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Description</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <textarea class="form-control" name="description">{{old('description', $property->description)}}</textarea>
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Number of Bedroom</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <input type="number" id="number_of_bedroom" name="number_of_bedroom" class="form-control" placeholder="1" value="{{old('number_of_bedroom', $property->number_of_bedroom)}}" required/>       
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Number of Bathroom</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <input type="number" id="number_of_bathroom" name="number_of_bathroom" class="form-control" placeholder="1" value="{{old('number_of_bathroom', $property->number_of_bathroom)}}" required/>       
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Default Image</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <input type="file" id="image" name="image" class="form-control" placeholder="1" value="{{old('image', $property->image_url)}}"/>       
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Additional Images</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <input type="file" id="image1" name="image1" class="form-control" placeholder="1" value="{{old('image1', $property->image1)}}"/>       
                                </p>
                                <p class="text-muted mb-0">
                                    <input type="file" id="image2" name="image2" class="form-control" placeholder="1" value="{{old('image2', $property->image2)}}"/>       
                                </p>
                                <p class="text-muted mb-0">
                                    <input type="file" id="image3" name="image3" class="form-control" placeholder="1" value="{{old('image3', $property->image3)}}"/>       
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Status</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <select class="form-select" name="listing_status">
                                        <option value="published" @if($property->listing_status == 'published') selected @endif>Published</option>
                                        <option value="draft" @if($property->listing_status == 'draft') selected @endif>Draft</option>
                                    </select>
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Suggested Repair Services</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    @foreach($services as $service)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="repair_service_id[]" value="{{$service->id}}" id="{{$service->id}}" @foreach($suggested_services as $s) @if($s->repair_service_id == $service->id) checked @endif @endforeach>
                                        <label class="form-check-label" for="{{$service->id}}">
                                            {{$service->service_name}}
                                        </label>
                                    </div>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Rental Options</p>
                                <a class="btn btn-secondary" href="/create/price/{{$property->id}}">Add Option</a>
                            </div>
                            <div class="col-sm-9">
                                <?php $i=1; ?>
                                @foreach($prices as $price)
                                <p class="text-muted mb-0">
                                    <div class="mb-2">
                                        <input type="hidden" name="price_id[]" value="{{$price->id}}"/>
                                        {{$i}}. <input type="number" name="interval[]" value="{{$price->interval}}" required/> month(s) contract - RM <input type="number" name="price[]" value="{{$price->price}}" required/> /month
                                    </div>
                                    <div class="text-end">
                                        <a class="btn btn-danger" href="/delete/price/{{$price->id}}?property_id={{$property->id}}">Remove</a>
                                    </div>
                                </p>
                                <hr>
                                <?php $i++; ?>
                                @endforeach
                            </div>
                        </div>
                        <hr>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary" value="Update"/>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection