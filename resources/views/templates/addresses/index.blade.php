@extends('templates.layouts.index')

@section( 'title', $site_settings->site_name . ' | ' . $page->title )

@section('content')
   	<div class="container-fluid profile-top-nav px-lg-0 px-3">
			<div class="row no-gutters">
				<div class="container profile-nav d-none d-lg-block px-lg-0 px-3">
						<div class="row">
								<div class="col-12">
										<a href="/profile" class="@if( Request::is('profile') ) active @endif">Profile</a>
										<a href="/profile/addresses" class="@if( Request::is('profile') ) active @endif">addresses</a>
										<a href="/profile/orders/current" class="@if( Request::is('profile/orders/current') ) active @endif">current orders</a>
										<a href="/profile/orders/past" class="@if( Request::is('profile/orders/past') ) active @endif">past orders</a>
										@if ( in_array( "Vault\StoreCredit\StoreCreditServiceProvider", get_declared_classes() ) )
										<a href="/profile/wallet" class="@if( Request::is('profile/wallet') ) active @endif">wallet</a>
										@endif
								</div>
						</div>
				</div>
				<div class="container mobile-profile-nav d-block d-lg-none">
						<div class="row">
								<div class="col-12 d-flex justify-content-between">
										<a href="/profile" class="@if( Request::is('profile') ) active @endif profile fa fa-user"></a>
										<a href="/profile/addresses" class="@if( Request::is('profile/addresses') ) active @endif profile-addresses fa fa-address-book"></a>
										<a href="/profile/orders/current" class="@if( Request::is('profile/orders/current') ) active @endif profile-current-orders fa fa-shopping-cart"></a>
										<a href="/profile/orders/past" class="@if( Request::is('profile/orders/past') ) active @endif profile-past-orders fa fa-shopping-basket"></a>
										<a href="/profile/wallet" class="@if( Request::is('profile/wallet') ) active @endif profile-wallet fa fa-wallet"></a>
								</div>
						</div>
					</div>
				</div>
			</div>

      <div class="container">
				<div class="row">
					<div class="col-12">
						<h1 class="add-address">ADDRESSES <a href="#" class="float-right">ADD</a></h1>
					</div>
				</div>
			</div>
	
	<div class="container mb-lg-5 mb-4">
		<div class="row">
			<div class="col-12">
				<div class="row">
					@foreach($addresses as $key => $address)
						<div class="col-12 col-lg-6 profile-address-block">
							<div>
								<div class="row">
									<h2 class="col-12">
										{{$address->address_name}}
										<a href="#edit_form_{{$address->id}}" class="address-edit"><i class="fa fa-pencil"></i> EDIT</a>
										<a href="/address/delete/{{$address->id}}" class="address-delete"><i class="fa fa-trash-o"></i> DELETE</a>
									</h2>
									<div class="col-12 col-md-6">
										<h3>First Name:</h3>
										<p>{{$address->name}}</p>
										<h3>Last Name:</h3>
										<p>{{$address->surname}}</p>
										<h3>Company Name:</h3>
										<p>{{$address->company}}</p>
										<h3>VAT Number:</h3>
										<p>{{$address->vat_number}}</p>
										<h3>Contact:</h3>
										<p>{{$address->phone}}</p>
									</div>
									<div class="col-12 col-md-6">
										<h3>Address:</h3>
										<p>{{$address->address_line_1}}<br>{{$address->address_line_2}}</p>
										<h3>Suburb:</h3>
										<p>{{$address->suburb}}</p>
										<h3>City:</h3>
										<p>{{$address->city}}</p>
										<h3>Province:</h3>
										<p>{{$address->province}}</p>
										<h3>Country:</h3>
										<p>{{$address->country}}</p>
										<h3>Postal Code:</h3>
										<p>{{$address->postal_code}}</p>
									</div>
								</div>
							</div>
						</div>
						<div class="edit-address-form" id="edit_form_{{$address->id}}">
								<h1>Edit Address <a href="#">X</a></h1>
								{!! Form::model($address, array('url' => '/profile/addresses/'.$address->id, 'data-parsley-validate' => '', 'id' => 'edit-address_'.$address->id )) !!}
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label class="col-12">Address Name*</label>
											<input name="address_name" placeholder='eg. "Home" or "Work" etc' class="col-12" required="" value="{{$address->address_name}}" />
										</div>
										<div class="form-group">
											<label class="col-12">First Name*</label>
											<input name="name" placeholder="First Name" class="col-12" required="" value="{{$address->name}}" />

										</div>
										<div class="form-group">
											<label class="col-12">Last Name*</label>
											<input name="surname" placeholder="Last Name" class="col-12" required="" value="{{$address->surname}}" />
										</div>
										<div class="form-group">
											<label class="col-12">Company</label>
											<input name="company" placeholder="Company" class="col-12" value="{{$address->company}}"  />
										</div>
										<div class="form-group">
											<label class="col-12">VAT Number</label>
											<input name="vat_number" placeholder="VAT Number" class="col-12" value="{{$address->vat_number}}"  />
										</div>
										<div class="form-group">
											<label class="col-12">Phone Number*</label>
											<input name="phone" placeholder="eg. 0832688122" class="col-12" required="" value="{{$address->phone}}" 
											    data-parsley-required="true" 
											    data-parsley-length="[7, 15]"
									        >
											<p class="col-12">May be printed on the label to assist delivery</p>
										</div>
										<div class="form-group">
                                            <label class="col-12" style="padding-left:50px;line-height:19px !important;margin-left:-15px;">
                                            @if($address->default_address == 1)
                                                <input class="icheck" type="checkbox" name="default_address" value="1" checked="">
                                            @else
                                                <input class="icheck" type="checkbox" name="default_address" value="1">
                                            @endif
                                                Use as default address?
                                            </label>
										</div>
									</div>
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label class="col-12">Street Address*</label>
											<input name="address_line_1" placeholder="Street Address Line 1" class="col-12" required="" value="{{$address->address_line_1}}" />
											<input name="address_line_2" placeholder="Street Address Line 2" class="col-12" value="{{$address->address_line_2}}" />
										</div>
										@if ( $config['external_courier_companies']['Aramex']['courier_enabled'] )
										<div class="form-group">
											<label class="col-12" for="edit-suburb_{{$address->id}}">Suburb*</label>
											<input name="suburb" placeholder="Suburb" class="col-12" id="edit-suburb_{{$address->id}}" list="edit-suburbia_{{$address->id}}" autocomplete="off" value="{{$address->suburb}}" required="" />
											<datalist id="edit-suburbia_{{$address->id}}"></datalist>
										</div>
										<script id="edit-address_{{$address->id}}-aramex-check">
        								$(document).ready(function(){
        									$("#edit-address_{{$address->id}}").on("submit", function(event){
        										event.preventDefault();
        							        	if( $("#edit-address_{{$address->id}} input[name=suburb]").val() === "" )  $("#edit-address_{{$address->id}} input[name=suburb]").val( "suburb" );
        										var formValues= $(this).serialize();
                                                $.post("/user/address/verify", formValues, function( data ) {
                                                  var parsedData = JSON.parse( data );
                                                  if ( parsedData.status !== 'undefined' && parsedData.status ) {
        					                        var postUrl = $('#edit-address_{{$address->id}}')[0].action;
                                                    $.post(postUrl, formValues, function( data ) {
                                                		$( this ).submit();
                                                        return window.location.reload();
                                                    });
        										  } else {
        												var suburbList = parsedData;
        												if ( suburbList ) {
        													var dlist = $("datalist#edit-suburbia_{{$address->id}}");
        													$("#edit-address_{{$address->id}} input[name=suburb]").val( "" );
        													$("#edit-address_{{$address->id}} input[name=suburb]").attr( 'style', 'box-shadow:0 0 1px 5px rgba(250, 0, 0, 0.375);borer-radius:0.125em;' );
        													$.each(suburbList, function(i, item) {
        														dlist.append( $("<option>").attr('value', item) );
        													});
        												}
        												return;
        											}
        										});
        									});
        								});
            							</script>
										@else
										<div class="form-group">
											<label class="col-12" for="edit-suburb_{{$address->id}}">Suburb*</label>
											<input name="suburb" placeholder="Suburb" class="col-12" id="edit-suburb_{{$address->id}}" autocomplete="off" value="{{$address->suburb}}" required="" />
										</div>
										@endif
										<div class="form-group">
											<label class="col-12">City/Town*</label>
											<input name="city" placeholder="City/Town" class="col-12" required="" value="{{$address->city}}" />
										</div>
										<div class="form-group">
											<label class="col-12">Province*</label>
											{!! Form::select('province', ['Eastern Cape' => 'Eastern Cape', 'Free State' => 'Free State', 'Gauteng' => 'Gauteng', 'Kwa-Zulu Natal' => 'Kwa-Zulu Natal', 'Limpopo' => 'Limpopo', 'Mpumalanga' => 'Mpumalanga', 'Northern Cape' => 'Northern Cape', 'North West' => 'North West', 'Western Cape' => 'Western Cape'], null, array('placeholder' => 'Province',  'class' => 'col-xs-12', 'required' => '')) !!}
										</div>
										<div class="form-group">
											<label class="col-12">Country*</label>
											{!! Form::text('country', "South Africa", array('placeholder' => 'Country',  'class' => 'col-xs-12', 'required' => '', 'readonly'=>'')) !!}
										</div>
										<div class="form-group">
											<label class="col-12">Postal Code*</label>
											<input name="postal_code" placeholder="Postal Code" class="col-12" required="" value="{{$address->postal_code}}" />
										</div>
									</div>
									<div class="col-12 full-width">
										{!! Honeypot::generate('my_name', 'my_time') !!}
										{!! Form::button('Save changes', array('type' => 'submit')) !!}
									</div>
								{!! Form::close() !!}
							</div>
							@if ( $config['external_courier_companies']['Aramex']['courier_enabled'] )
							<script id="edit-address_{{$address->id}}-aramex-check">
								$(document).ready(function(){
									$("#edit-address_{{$address->id}}").on("submit", function(event){
										event.preventDefault();
							        	if( $("#edit-address_{{$address->id}} input[name=suburb]").val() === "" )  $("#edit-address_{{$address->id}} input[name=suburb]").val( "suburb" );
										var formValues= $(this).serialize();
                                        $.post("/user/address/verify", formValues, function( data ) {
                                          var parsedData = JSON.parse( data );
                                          if ( parsedData.status !== 'undefined' && parsedData.status ) {
					    								var postUrl = $('#edit-address_{{$address->id}}')[0].action;
                                            $.post(postUrl, formValues, function( data ) {
                                        		$( this ).submit();
                                                return window.location.reload();
                                            });
										  } else {
												var suburbList = parsedData;
												if ( suburbList ) {
													var dlist = $("datalist#edit-suburbia_{{$address->id}}");
													$("#edit-address_{{$address->id}} input[name=suburb]").val( "" );
													$("#edit-address_{{$address->id}} input[name=suburb]").attr( 'style', 'box-shadow:0 0 1px 5px rgba(250, 0, 0, 0.375);borer-radius:0.125em;' );
													$.each(suburbList, function(i, item) {
														dlist.append( $("<option>").attr('value', item) );
													});
												}
												return;
											}
										});
									});
								});
							</script>
						    @endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	
	<div class="add-address-overlay"></div>
	<div class="add-address-form">
			<h1>Add Address <a href="#">X</a></h1>
			{!! Form::open(array('url' => '/user/address/add', 'data-parsley-validate' => '', 'autocomplete' => "off", 'id' => 'add-address')) !!}
					<div class="col-12 col-md-6">
							<div class="form-group">
									<label class="col-12">Address Name*</label>
									<input name="address_name" placeholder='eg. "Home" or "Work" etc' class="col-12" required="" />
							</div>
							<div class="form-group">
									<label class="col-12">First Name*</label>
									<input name="name" placeholder="First Name" class="col-12" required="" />
							</div>
							<div class="form-group">
									<label class="col-12">Last Name*</label>
									<input name="surname" placeholder="Last Name" class="col-12" required="" />
							</div>
							<div class="form-group">
									<label class="col-12">Company</label>
									<input name="company" placeholder="Company" class="col-12"  />
							</div>
							<div class="form-group">
									<label class="col-12">VAT Number</label>
									<input name="vat_number" placeholder="VAT Number" class="col-12"  />
							</div>
							<div class="form-group">
									<label class="col-12">Phone Number*</label>
									<input name="phone" placeholder="eg. 0832688122" class="col-12" required=""
										data-parsley-required="true" 
										data-parsley-length="[7, 15]"
									/>
							</div>
							<div class="form-group">
									<label class="col-12">Confirm Phone Number*</label>
									<input name="phone_confirmation" placeholder="eg. 0832688122" class="col-12" required="" 
									data-parsley-required="true" 
									data-parsley-length="[7, 15]"
									/>
									<p class="col-12">May be printed on the label to assist delivery</p>
							</div>
					</div>
					<div class="col-12 col-md-6">
							<div class="form-group">
									<label class="col-12">Street Address*</label>
									<input name="address_line_1" placeholder="Street Address Line 1" class="col-12" required="" />
									<input name="address_line_2" placeholder="Street Address Line 2" class="col-12" />
							</div>
							<div class="form-group" data-verify-provider="pp_tcg">
									<label class="col-12" for="suburb">Suburb*</label>
									<input name="suburb" placeholder="Suburb" class="col-12" id="suburb" list="suburbia" autocomplete="off" required="" />
									<datalist id="suburbia"></datalist>
							</div>
							<div class="form-group">
									<label class="col-12">City/Town*</label>
									<input name="city" placeholder="City/Town" class="col-12" required="" />
							</div>
							<div class="form-group">
									<label class="col-12">Province*</label>
									{!! Form::select('province', ['Eastern Cape' => 'Eastern Cape', 'Free State' => 'Free State', 'Gauteng' => 'Gauteng', 'Kwa-Zulu Natal' => 'Kwa-Zulu Natal', 'Limpopo' => 'Limpopo', 'Mpumalanga' => 'Mpumalanga', 'Northern Cape' => 'Northern Cape', 'North West' => 'North West', 'Western Cape' => 'Western Cape'], null, array('placeholder' => 'Province',  'class' => 'col-xs-12', 'required' => '')) !!}
							</div>
							<div class="form-group">
									<label class="col-12">Country*</label>
									{!! Form::text('country', "South Africa", array('placeholder' => 'Country',  'class' => 'col-xs-12', 'required' => '', 'readonly'=>'')) !!}
							</div>
							<div class="form-group">
									<label class="col-12">Postal Code*</label>
									<input name="postal_code" placeholder="Postal Code" class="col-12" required="" />
							</div>
					</div>
					<div class="col-12 full-width">
							{!! Honeypot::generate('my_name', 'my_time') !!}
							{!! Form::button('Save changes', array('type' => 'submit')) !!}
					</div>
			{!! Form::close() !!}
	</div>
	
	@if ( $config['external_courier_companies']['Aramex']['courier_enabled'] || $config['external_courier_companies']['TheCourierGuy']['courier_enabled'] )
	<script id="add-address-aramex-check">
	/**
		* // keys should match input's parent data-verify-provider value.
		* // Example valid values for key: aramex |OR| pp_tcg |OR| ...
		*/
	var verificationUrls = {
		'aramex': '/user/address/verify',
		'pp_tcg': '/user/address/verify/provider/pp_tcg',
	};

	$(document).ready(function(){
		$("#add-address").on("submit", function(event){
			event.preventDefault();

			var form = $( this );
			// var formValues = this.elements;
			// var formValuesJson = JSON.stringify( formValues );
			var formValues= form.serialize();

			// if ( ! formValues.has( '_token' ) ) formValues.append( '_token', {{ csrf_token() }} );
			if( $("#add-address input[name=suburb]").val() === "" ) $("#add-address input[name=suburb]").val( "suburb" );

			var provider  = document.querySelector( '.form-group[data-verify-provider]' );
			var verifyUri = verificationUrls[provider.dataset.verifyProvider];

			$.post( verifyUri, formValues, function( data ) {
				console.log( data );

				var parsedData = JSON.parse( data );

				if ( parsedData.status !== 'undefined' && parsedData.status ) {
					var formValues = form.serialize();
					$.post("/user/address/add", formValues, function( data ) {
						form.submit();

						return window.location.reload();
					});
				
				} else {
					var suburbList = parsedData;
				
					if ( suburbList ) {
						var dlist = $("datalist#suburbia");
						$("#add-address input[name=suburb]").val( "" );
						$("#add-address input[name=suburb]").attr( 'style', 'box-shadow:0 0 1px 5px rgba(250, 0, 0, 0.375);borer-radius:0.125em;' );
				
						// hiddenPlaceId = document.createElement( 'input' );
						// hiddenPlaceId.setAttribute( 'type', 'hidden' )
						// 						 .setAttribute( 'class', 'collapse d-none hidden' )
						// 						 .setAttribute( 'name', 'pp_tcg_place_id' );

						// form.appendChild( hiddenPlaceId );

						// console.log( suburbList );
						$.each(suburbList, function(i, item) {
							console.log( i );
							console.log( item );
							if ( item.hasOwnProperty( 'town' ) ) {
								var inputValue = i + '|' + item.town + '|' + item.place; // item.town.replace( /\,.+?$/ig, '' );
								console.log( inputValue );
								dlist.append( $("<option>").attr('value', inputValue).attr('data-place-id', item.place ) ); // .text( inputValue ) );
							} else {
								dlist.append( $("<option>").attr('value', i) );
							}
						});

						$("#add-address input[name=suburb]").on( 'change', function() {
							// event.stopImmediatePropagation();
							// event.stopPropagation();
							// // var hiddenPlaceIdPopulated = form.querySelector( '[name*=pp_tcg_place_id]' );
							// console.log( event );
							// return;
					    var formValues = form.serialize();
							console.log( formValues );
							$.post("/user/address/add", formValues, function( data ) {
								form.submit();

								return window.location.reload();
							});
						})
					}
				
					return;
				}
			});
		});
	});
	</script>
	@endif

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/blue.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
	<script>$('input.icheck').iCheck({ checkboxClass: 'icheckbox_square-blue', radioClass: 'iradio_square-blue', });</script>

@endsection
