@extends('front.layouts.layout')
@section('content')
<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="{{route('home')}}">Home</a> </li>
            <li><a href="{{route('raise.query')}}">Raise Query</a> </li>
        </ul>
    </div>    
</div>
<section class="queryPart">
    <div class="container">
        <div class="titlePart">
            <h4>Raised Your Query</h4>
            <p>Enter your email or mobile to fill your need</p>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form class="raiseForm" id="raise_form" action="{{ route('query.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="margin-left: -12px;margin-right: -12px;">
            <div class="inputMainBlock">
                <span>Full Name<i>*</i></span>
                <input type="text" name="full_name" class="FullNameVD" placeholder="Full Name"> 
                @error('full_name')
                    <div class="errormsg">{{ $message }}</div>
                @enderror
            </div>
            <div class="inputMainBlock">
                <span>E-mail ID<i>*</i></span>
                <input type="text" name="email" class="emailVD" placeholder="example@gmail.com"> 
                @error('email')
                    <div class="errormsg">{{ $message }}</div>
                @enderror
            </div>
            <div class="inputMainBlock">
                <span>Mobile Number<i>*</i></span>
                <input type="text" name="mobile" class="mobileVD" placeholder="00000 00000"> 
                @error('mobile')
                    <div class="errormsg">{{ $message }}</div>
                @enderror
            </div>
            <div class="inputMainBlock">
                <span>Product Name</span>
                <input type="text" name="product_name" class="AnyValueVD" placeholder="wheelchair"> 
                @error('product_name')
                    <div class="errormsg">{{ $message }}</div>
                @enderror
            </div>
            <div class="inputMainBlock">
                <span>Upload Reference<i>*</i></span>
                <label class="fileUpload">
                    Browse Picture <img src="{{ asset('front/images/upload.svg') }}" alt="" />
                    <input type="file" name="file_upload" class="file-upload AnyValueVD" />
                </label>
                <div class="uploadedPart">
                    <div class="imgDis">
                        <a href="#;">
                            <img src="{{ asset('front/images/Remove_x.svg') }}" alt="" class="close1" />
                        </a>
                        <img src="#" alt="" class="uploadeedImg" />
                    </div>
                    <p>Image Upload Successfully</p>
                </div>
                @error('file_upload')
                    <div class="errormsg">{{ $message }}</div>
                @enderror
            </div>
            <div class="inputMainBlock">
                <span>Description</span>
                <textarea name="description" class="AnyValueVD"></textarea>
                @error('description')
                    <div class="errormsg">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="checkboxPart">
        <div class="">
            <label>
                <input type="checkbox" name="terms" />
                <i></i>
            </label>
            I read and understand <a href="#;">Terms and Conditions</a>.
        </div>
        @error('terms')
            <div class="errormsg">{{ $message }}</div>
        @enderror
        <button type="submit">Submit Query</button>
        </div>
        </form>

        <!-- <form class="raiseForm" id="raise_form" action="{{ route('query.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="margin-left: -12px;margin-right: -12px;">
                <div class="inputMainBlock">
                    <span>Full Name<i>*</i></span>
                    <input type="text" class="FullNameVD" placeholder="Full Name" name="full_name"> 
                    @error('full_name')
                        <div class="errormsg">{{ $message }}</div>
                        <div class="errormsg">Please enter Full Name</div>
                    @enderror
                </div>
                <div class="inputMainBlock">
                    <span>E-mail ID<i>*</i></span>
                    <input type="text" class="emailVD" placeholder="example@gmail.com"> 
                    <div class="errormsg">Please enter E-mail ID</div>
                </div>
                <div class="inputMainBlock">
                    <span>Mobile Number<i>*</i></span>
                    <input type="text" class="mobileVD" placeholder="00000 00000"> 
                    <div class="errormsg">Please enter Mobile Number</div>
                </div>
                <div class="inputMainBlock">
                    <span>Product Name</span>
                    <input type="text" class="AnyValueVD" placeholder="wheelchair"> 
                    <div class="errormsg">Please enter Product Name</div>
                </div>
                <div class="inputMainBlock">
                    <span>Upload Reference<i>*</i></span>
                    <label class="fileUpload">
                        Browse Picture <img src="{{ asset('front/images/upload.svg') }}" alt="" />
                        <input type="file" class="file-upload AnyValueVD" />
                    </label>
                    <div class="uploadedPart">
                        <div class="imgDis">
                            <a href="#;">
                                <img src="{{ asset('front/images/Remove_x.svg') }}" alt="" class="close1" />
                            </a>
                            <img src="#" alt="" class="uploadeedImg" />
                        </div>
                        <p>Image Upload Successfully</p>
                    </div>
                    <div class="errormsg">Please choose picture</div>
                </div>
                <div class="inputMainBlock">
                    <span>Description</span>
                    <textarea class="AnyValueVD"></textarea>
                    <div class="errormsg">Please enter description</div>
                </div>
                
                
            </div>
            <div class="checkboxPart">
                <div class="">
                    <label>
                        <input type="checkbox" />
                        <i></i>
                    </label>
                    I read and understand <a href="#;">Terms and Conditions</a>.
                </div>
                <button type="submit">Submit Query</button>
            </div>
        </form> -->
    </div>
</section>
@endsection('content')