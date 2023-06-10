<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HouseSearchKE</title>
    <link href="../Css/style-upload.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@500;600&family=PT+Sans&display=swap" rel="stylesheet">
    <script defer src="../Javascript/upload.js"></script>       
</head>
<body>
    <div class="container">
        <nav>
            <h3><?php echo $firstName . " " . $lastName;?></h3>
            <button type="submit"><a href="../Html/index.html" tabindex="-1">Sign Out</a></button>
        </nav>
        <form class="main-body" id="form" action="../Php/rental-uploader.php" method="post" enctype="multipart/form-data" onsubmit="validateForm(event)">
            <div class="buttons">
                <button onClick="wrapperFunction('.basic-information', 'flex', '.optional-information', 'input')" type="button">Basic Information</button>
                <button onClick="wrapperFunction('.optional-information', 'block', '.basic-information', null)" type="button">Optional Information</button>
            </div>
            <div class="basic-information">
                    <div class="nameofRental" id="nameofRental">
                        <label class="name-of-rental" for="name-of-rental">Name Of Rental</label>
                        <input type="text" class="name-of-rental" id="name-of-rental" name="name-of-rental" onblur="forNameOfRental()">
                        <div class="error"></div>
                    </div>

                    <div class="rentalType" id="rentalType">
                        <label class="type-of-rental" for="type-of-rental">Type of Rental</label>
                        <select class="type-of-rental" id="type-of-rental" name="type-of-rental" onchange="forRentalType()"
                        onblur="forRentalType2()">
                            <option value="no-value">Please choose the kind of rental you want to advertise </option>
                            <option value="Hostel">Hostel</option>
                            <option value="Single Room">Single Room</option>
                            <option value="Bedsitter">Bedsitter</option>
                            <option value="Apartment">Apartment</option>
                            <option value="Business Premise">Business Premise</option>
                            <option value="House">House</option> 
                            <option value="Suite">Suite</option>
                        </select>
                        <div class="error"></div>
                    </div> 
                    
                    <div class="apartmentBedrooms" id="apartmentBedrooms">
                        <label class="number-of-apartment-bedrooms" id="label-number-of-apartment-bedrooms" for="number-of-apartment-bedrooms">Number of Bedrooms</label>
                        <select class="number-of-apartment-bedrooms" name="number-of-apartment-bedrooms" id="number-of-apartment-bedrooms" onchange="viewNumberOfSpecificApartmentBedrooms()" onblur="forApartmentBedrooms()">
                            <option value="no-value">Please specify the number of bedrooms available in the Apartment you want to advertise</option>
                            <option value="1-bedroom">1 Bedroom</option>
                            <option value="2-bedroom">2 Bedrooms</option>
                            <option value="3-bedroom">3 Bedrooms</option>
                            <option value="more">More </option>                                              
                        </select>
                        <div class="error"></div>
                    </div>
                    
                    <div class="moreApartmentBedrooms" id="moreApartmentBedrooms">
                        <label class="more-apartment-bedrooms" for="more-apartment-bedrooms">How many?</label>
                        <input class="more-apartment-bedrooms" type="number" name="more-apartment-bedrooms" id="more-apartment-bedrooms" onchange="specifyTheFinalTheNumberOfApartments()" onblur="forMoreApartmentBedrooms()">
                        <div class="error"></div>
                    </div>
                    
                    <div class="businessPremiseType" id="businessPremiseType">
                        <label class="type-of-business-premise" id="label-type-of-premise" for="type-of-premise">Type of business Premise</label>
                        <select class="type-of-business-premise" name="type-of-premise" id="type-of-premise" onchange="viewNumberofSpecificBusinessPremises1()" onfocus="viewNumberofSpecificBusinessPremises()" onblur="forBusinessPremises()">
                            <option value="no-value">Please specify the type of business premise you want to advertise</option>
                            <option value="Stall">Stall</option>
                            <option value="Shop">Shop</option>
                            <option value="Event Hall">Event Hall</option>
                            <option value="Warehouse">Warehouse</option>
                            <option value="Office">Office</option>
                            <option value="Industrial">Industrial</option>
                        </select>
                        <div class="error"></div>
                    </div>
                    
                    <div class="houseBedrooms" id="houseBedrooms">
                        <label class="number-of-house-bedrooms" id="label-number-of-house-bedrooms" for="number-of-house-bedrooms">Number of Bedrooms</label>
                        <select class="number-of-house-bedrooms" name="number-of-house-bedrooms" id="number-of-house-bedrooms" onchange="viewNumberofSpecificHouseBedrooms()" onblur="forHouseBedrooms() ">
                            <option value="no-value">Please specify the number of bedrooms available in the House you want to advertise</option>
                            <option value="1-bedroom">1 Bedroom</option>
                            <option value="2-bedroom">2 Bedrooms</option>
                            <option value="3-bedroom">3 Bedrooms</option>
                            <option value="more">More </option>                                              
                        </select>
                        <div class="error"></div>
                    </div>
                    
                    <div class="moreHouseBedrooms" id="moreHouseBedrooms">
                        <label class="more-house-bedrooms" for="more-house-bedrooms">How many?</label>
                        <input class="more-house-bedrooms" type="number" name="more-house-bedrooms" id="more-house-bedrooms" onchange="specifyTheFinalTheNumberOfHouses()" onblur="forMoreHouseBedrooms()">
                        <div class="error"></div>
                    </div>

                    <div class="numberOfAvailableRentals" id="numberOfAvailableRentals">
                        <label class="number-of-available-rentals"for="number-of-available-rentals">Number of Available </label>
                        <input type="number" class="number-of-available-rentals"name="number-of-available-rentals" id="number-of-available-rentals" onblur="forFinalNumberOfRentals()">
                        <div class="error"></div>
                    </div>

                    <div class="maximumNumberOfOccupants" id="maximumNumberOfOccupants">
                        <label class="maximum-occupants" for="maximum-occupants">Preferred Maximum Number of Occupants For Each</label>
                        <input class="maximum-occupants" type="number" name="maximum-occupants" id="maximum-occupants" onblur="forMaximumNumberOfOccupants()">
                        <div class="error"></div>
                    </div>

                    <div class="locationDiv" id="locationDiv">
                        <label class="location" for="location">Location</label>
                        <input class="location" type="text" name="location" id="location" onblur="locationSuccessOrFailure()">
                        <div class="error"></div>
                    </div>                    

                    <div class="rentalTerm" id="rentalTerm">
                        <label class="rental-term" for="rental-term">Rental Term</label>
                        <select class="rental-term" name="rental-term" id="rental-term" onblur="rentalTermSuccessorFailure()">
                            <option value="no-value"></option>
                            <option value="daily">Daily</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                            <option value="yearly">Yearly</option>
                            <option value="quarterly">Quarterly (Once every three months)</option>option>
                            <option value="bi-annually">Bi-anually (Once every six months)</option>                                            
                        </select>
                        <div class="error"></div>
                    </div>                    

                    <div class="rentDiv" id="rentDiv">
                        <label class="rent" for="rent">Amount of Rent</label>
                        <input class="rent" type="number" name="rent" id="rent" onblur="amountOfRentSuccessOrFailure()">
                        <div class="error"></div>
                    </div>

                    <div class="descriptionDiv" id="descriptionDiv">
                        <label class="description" for="description">Description</label>
                        <textarea id="description" name="description" placeholder="Write anything you may want to pitch your rental to potential tenants"></textarea>
                        <div class="error"></div>
                    </div>

                    <div class="imagesDiv" id="imagesDiv">
                        <div class="upload-photographs" tabindex="0" onkeydown="triggerFileInput(event)" onblur="imagesSuccessOrFailure()">
                            <label for="images-upload"> Upload Photographs</label>                          
                            <input type="file" name="images-upload[]" id="images-upload" accept="image/*" multiple onchange="imagesSuccessOrFailure()">                        
                        </div>
                        <div class="error" id="imageError"></div>
                    </div>                    
            </div>
            <div class="optional-information">
                <div class="ammenities">
                    <h4>Ammenities</h4>
                    
                    <div class="clean-water">
                        <input type="checkbox"  name="clean-water" id="clean-water">
                        <label for="clean-water"> Clean Tap Water/ Water Reserves (Tanks and/or Borehole)</label>
                    </div>
                    
                    <h5>Electricity</h5>
                    <div class="electricity-token">
                        <input type="checkbox" name="token" id="token">
                        <label for="token"> Individual Token</label>
                    </div>
                    
                    <div class="electricity-meter">
                        <input type="checkbox" name="meter" id="meter">
                        <label for="meter"> Shared Meter</label>
                    </div>
                    
                    <h5>Security</h5>

                    <div class="security-guard">
                        <input type="checkbox" name="security-guard" id="security-guard">
                        <label for="security-guard"> Security Guard</label>
                    </div>

                    <div class="cctv">
                        <input type="checkbox" name="cctv" id="cctv">
                        <label for="cctv"> CCTV</label>
                    </div>
                    
                    <div class="security-lights">
                        <input type="checkbox" name="security-lights" id="security-lights">
                        <label for="security-lights"> Security Lights</label>                    
                    </div>
                    
                    <h5>Toilets</h5>
                    
                    <div class="pit-latrine">
                        <input type="checkbox" name="pit-latrine" id="pit-latrine">
                        <label for="pit-latrine"> Communal Pit Latrine</label>
                    </div>
                    
                    <div class="automatic-toilet">
                        <input type="checkbox" name="automatic-toilet" id="automatic-toilet">
                        <label for="automatic-toilet"> Communal Automatic Toilets</label>
                    </div>
                    
                    <h5>Cleaning</h5>
                    
                    <div class="garbage-collection">
                        <input type="checkbox" name="garbage-collection" id="garbage-collection">
                        <label for="garbage-collection"> Garbage Collection</label>
                    </div>
                    <div class="cleaner">
                        <input type="checkbox" name="cleaner" id="cleaner">
                        <label for="cleaner"> Cleaner for the shared spaces (e.g toilets/ablution block)</label>
                    </div>
                    <div class="sink">
                        <input type="checkbox" name="sink" id="sink">
                        <label for="sink"> Sink</label>
                    </div>
                    
                    <h5>Accessibility</h5>

                    <div class="handicap-access">
                        <input type="checkbox" name="handicap-access" id="handicap-access">
                        <label for="handicap-access"></label>Handicap/ WheelChair Access</label>
                    </div>
                    <div class="packing">
                        <input type="checkbox" name="packing" id="packing">
                        <label for="packing"></label>Packing</label>
                    </div>
                    
                    <h5> Finishing</h5>

                    <div class="tiles">
                        <input type="checkbox" name="tiles" id="tiles">
                        <label for="tiles" class="tiles"> Tiles</label>
                    </div>
                    <div class="ceiling">
                        <input type="checkbox" class="ceiling" name="ceiling" id="ceiling">
                        <label for="ceiling"> Ceiling</label>
                    </div>
                    <div class="balcony">
                        <input type="checkbox" name="balcony" id="balcony">
                        <label for="balcony"></label>Balcony</label>
                    </div>
                   
                    <h5>luxury</h5>

                    <div class="wi-fi">
                        <input type="checkbox" name="wi-fi" id="wi-fi">
                        <label for="wi-fi"> Wi-Fi</label>
                    </div>
                    <div class="joint-tv-subscription">
                        <input type="checkbox" name="joint-tv-subscription" id="joint-tv-subscription">
                        <label for="joint-tv-subscription"> Joint TV Subscription</label>
                    </div>
                    <div class="air-conditioning">
                        <input type="checkbox"  name="air-conditioning" id="air-conditioning">
                        <label for="air-conditioning"></label>Air Conditioning</label>
                    </div>
                    <div class="furnished">
                        <input type="checkbox" name="furnished" id="furnished">
                        <label for="furnished"></label>Furnished</label>
                    </div>
                    <div class="swimming-pool">
                        <input type="checkbox" name="swimming-pool" id="swimming-pool">
                        <label for="swimming-pool"></label>Swimming Pool</label>
                    </div>
                    <div class="gym">
                        <input type="checkbox" name="gym" id="gym">
                        <label for="gym"></label>Gym</label>
                    </div>  
                </div>
                <div class="preferences">
                    <h4>Preferred sorts of tenants</h4>
                    
                    <h5>Gender</h5>

                    <div class="gender">
                        <div class="male">
                            <input type="radio" name="gender" value="Males" id="male">
                            <label for="male">Males</label>
                        </div>
                        <div class="female">
                            <input type="radio" name="gender" value="Females" id="female">
                            <label for="female">Females</label>
                        </div>
                        <div class="any-gender">
                            <input type="radio" name="gender" value="Any Gender" id="any-gender">
                            <label for="any-gender">Any gender</label>
                        </div>                  
                    </div>
                   
                    <h5>Students: </h5>

                    <div class="students">
                        <div class="no-students">
                            <input type="radio" name="students" value="No Students" id="no-students">
                            <label for="students">No Students</label>
                        </div>
                        <div class="students-welcome">
                            <input type="radio" name="students" value="Students Welcome" id="students-welcome">
                            <label for="students">Students Welcome</label>
                        </div>                  
                    </div>

                    <h5>Families that are welcome: </h5>

                    <div class="families">
                        <div class="no-children">
                            <input type="radio" name="family" value="No Children" id="no-children">
                            <label for="no-children">Without small childen</label>
                        </div>
                        <div class="children-allowed">
                            <input type="radio" name="family" name="Any Family Welcome" id="any-welcome">
                            <label for="any-welcome">Any Family</label>
                        </div>                  
                    </div>

                    <h5>Driving: </h5>

                    <div class="driving">
                        <div class="having-vehicles">
                            <input type="radio" name="vehicles" value="Vehicles Allowed" id="having-vehicles">
                            <label for="having-vehicles">Having Vehicles</label>
                        </div>
                        <div class="not-having-vehicles">
                            <input type="radio" name="vehicles" value="Vehicles Not Allowed" id="not-having-vehicles">
                            <label for="not-having-vehicles">Not having vehicles (No packing)</label>
                        </div>
                    </div>

                    <h5> Practicing members of:</h5>
                    
                    <div class="religion">
                        <div class="christianity">
                            <input type="checkbox" name="Christianity" value="christianity" id="christianity">
                            <label for="christianity">Christianity</label>
                        </div>
                        <div class="islam">
                            <input type="checkbox" name="islam" value="islam" id="islam">
                            <label for="islam">Islam</label>
                        </div>
                        <div class="hinduism">
                            <input type="checkbox" name="hinduism"value="hinduism" id="hinduism">
                            <label for="hinduism">Hinduism</label>
                        </div>
                        <div class="other-religion">
                            <input type="checkbox" 
                            name="other-religion"
                            value="other-religion" id="other-religion" onclick="specifyWhichReligion()">
                            <label for="other-religion">Other</label>                         
                        </div>
                        <div class="specified-religion">
                            <input type="text" name="specified-religion" id="specified-religion">
                        </div>                       
                        <div class="any-religion">
                            <input type="checkbox" 
                            name="any-religion"
                            value="any-religion" id="any-religion" onclick="uncheckAllOthers()">
                            <label for="any-religion">Any Religion</label>
                        </div>               
                    </div>                  
                </div>
                <div class="rules">
                    <h4>Rules of the rental</h4>
                    <p>Please upload an image file (a picture) containing the rules of your place, rather than having to write them all down.</p>
                    <div class="upload-rules">
                        <label for="rules-upload"> Upload Rules</label>
                        <input type="file" name="rules-upload" id="rules-upload" multiple>                        
                    </div>                   
                </div>
            </div>

            <input type="hidden" name="email" value="<?php echo $email;?>">
            <input type="hidden" name="phone-number" value="<?php $phoneNumber;?>">

            <div class="submit-entry">
                <button type="submit">Submit</button>
            </div>            
        </form>
    </div>
</body>
</html>