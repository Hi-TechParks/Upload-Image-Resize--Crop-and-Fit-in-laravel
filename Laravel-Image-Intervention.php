Use full link for more documentation:

01. http://image.intervention.io/getting_started/installation
02. https://appdividend.com/2018/04/13/laravel-image-intervention-tutorial-with-example/

Getting Start / installation process via composer
http://image.intervention.io/getting_started/installation

<!--

The best way to install Intervention Image is quickly and easily with Composer.

To install the most recent version, run the following command.

	composer require intervention/image


After you have installed Intervention Image, open your Laravel config file config/app.php and add the following lines.

In the $providers array add the service providers for this package.

    Intervention\Image\ImageServiceProvider::class,


Add the facade of this package to the $aliases array.

    'Image' => Intervention\Image\Facades\Image::class,


Now the Image Class will be auto-loaded by Laravel.

-->


<?php

	// image upload, fit and store inside public folder 
	if($request->hasFile('slide_image')){
	    $filenameWithExt = $request->file('slide_image')->getClientOriginalName();
	    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
	    $extension = $request->file('slide_image')->getClientOriginalExtension();
	    $fileNameToStore = $filename.'_'.time().'.'.$extension;

	    //Resize And Crop as Fit image here (500 width, 280 height)
	    $thumbnailpath = 'uploads/images/gallery/'.$fileNameToStore;
	    $img = Image::make($request->file('slide_image')->getRealPath())->fit(500, 280, function ($constraint) { $constraint->upsize(); })->save($thumbnailpath);
	}
	else{
	    $fileNameToStore = 'noimage.jpg'; // if no image selected this will be the default image
	}

?>


<?php

	// image upload, fit and store inside storage folder 
    if($request->hasFile('slide_image')){
        $filenameWithExt = $request->file('slide_image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
        $extension = $request->file('slide_image')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $path = $request->file('slide_image')->storeAs('public/images/gallery', $fileNameToStore);

        //Resize And Crop as Fit image here (500 width, 280 height)
        $thumbnailpath = public_path('storage/images/gallery/'.$fileNameToStore);
        $img = Image::make($request->file('slide_image')->getRealPath())->fit(500, 280, function ($constraint) { $constraint->upsize(); })->save($thumbnailpath);
    }
    else{
        $fileNameToStore = 'noimage.jpg'; // if no image selected this will be the default image
    }

?>




You will be able to use just resize and just crop function also. For know more visit all documentation website.