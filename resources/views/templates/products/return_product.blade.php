@if($product->product != null)
    <div class="col-12 col-md-6 profile-product-block">
        <div>
            <div class="row">
                <div class="col-12 col-md-5">
                    <img class="img-fluid" src="/{{$product->product->product_thumbnail}}" />
                </div>
                <div class="col-12 col-md-7">
                    <h3>{{$product->product->title}}</h3>
                    <p><span>Code:</span>{{$product->product->code}}</p>
                    <p><span>QTY:</span>1</p>
                    <p><span>Unit Price:</span>{{$product->product->price}}</p>
                    @if($product->components != null && $product->components != 'null')
                        <?php
                            $components = json_decode($product->components);
                            foreach($components as $key => $component){
                                $prod = \App\Models\Product::find($component);
                                $productVariant = \App\Models\ProductVariant::where('variant_id', $prod->id)->first();
                                if($prod->parent_id != null){
                                    if($key == 0){
                                        echo '<h4 style="margin-top: 10px;margin-bottom: 2px;text-transform:uppercase;"><strong>'.$prod->parent->title.'</strong></h4>';
                                    }else{
                                        echo '<h4 style="margin-top: 15px;margin-bottom: 2px;text-transform:uppercase;"><strong>'.$prod->parent->title.'</strong></h4>';
                                    }
                                }else{
                                    if($key == 0){
                                        echo '<h4 style="margin-top: 10px;margin-bottom: 2px;text-transform:uppercase;"><strong>'.$prod->title.'</strong></h4>';
                                    }else{
                                        echo '<h4 style="margin-top: 15px;margin-bottom: 2px;text-transform:uppercase;"><strong>'.$prod->title.'</strong></h4>';
                                    }
                                }
                                $fils = json_decode($productVariant->filters);
                                foreach($fils as $key => $value){
                                        $group = \App\Models\FilterOptionGroup::find($key);
                                        $option = \App\Models\FilterOption::find($value);
                                        echo '<h4><span>'.$group->title.':</span> '.$option->title.'</h4>';
                                }
                            }
                        ?>
                    @elseif($product->filters != 'null' && $product->filters != "" && $product->filters != null)
                        <?php $fils = json_decode($product->filters);
                        foreach($fils as $key => $value){
                            $group = App\Models\FilterOptionGroup::find($key);
                                $option = \App\Models\FilterOption::find($value);
            
                                echo '<p><span>'.$group->title.':</span> '.$option->title.'</p>';
                        } ?>
                    @endif
                    <a href="#return_modal_{{$product->id}}" class="return-item">Return Item</a>
                </div>
            </div>
        </div>
    </div>
    <div class="return-modal" id="return_modal_{{$product->id}}">
        <h1 class="col-12">Return this item? <a class="return-close float-right" href="#">X</a></h1>
        <h2 class="col-12">{{$product->product->title}}</h2>
        <h3 class="col-12">{{$product->product->code}}</h3>
        {!! Form::open(['files' => true]) !!}
            <input type="hidden" value="{{$product->id}}" name="product_id" />
        
            <div class="row">
                <div class="col-12 col-lg-6">
                    <label>Reason:</label>
                    <select name="reason" required>
                        <option value="">Select a reason</option>
                        <option value="Item was damaged">Item was damaged</option>
                        <option value="Wrong colour">Wrong colour</option>
                    </select>
                </div>
                <div class="col-12 col-lg-6">
                    <label>Full Name:</label>
                    <input name="name" type="text" required />
                </div>
                <div class="col-12 col-lg-6">
                    <label>Email:</label>
                    <input name="eamil" type="text" required />
                </div>
                <div class="col-12 col-lg-6">
                    <label>Contact No:</label>
                    <input name="contact" type="text" required />
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-8">
                    <label>Comments</label>
                    <textarea name="comments"></textarea>
                </div>
                <div class="col-12 col-lg-4">
                    <label class="file-label">
                        <input id="files" type="file" multiple name="images[]" />
                        Upload all images at once
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="col-12 preview-section" id="preview_return_modal_{{$product->id}}">
                </div>
            </div>

            <button type="submit">
                Submit
            </button>
        {!! Form::close() !!}
    </div>

    <script>

        $("#return_modal_{{$product->id}} .file-label").click(function(){
            $(".thumbnail").remove();
        });
        
            if(window.File && window.FileList && window.FileReader){
                var filesInput = document.getElementById("return_modal_{{$product->id}}");
                filesInput.addEventListener("change", function(event){
                var files = event.target.files; //FileList object
                var output = document.getElementById("preview_return_modal_{{$product->id}}");
                for(var i = 0; i< files.length; i++){
            var file = files[i];
            //Only pics
            if(!file.type.match('image'))
            continue;
            var picReader = new FileReader();
            picReader.addEventListener("load",function(event){
            var picFile = event.target;
            var div = document.createElement("div");
            div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
            "title='" + picFile.name + "'/>";
            output.insertBefore(div,null);
            });
            //Read the image
            picReader.readAsDataURL(file);
            }
            });
            }
            else
            {
            console.log("Your browser does not support File API");
            }
    </script>
@endif