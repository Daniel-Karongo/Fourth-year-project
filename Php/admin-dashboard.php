<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HouseSearchKE</title>
    <link href= "../Css/style-admin-dashboard.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@500;600&family=PT+Sans&display=swap" rel="stylesheet">
    <script src="../Javascript/admin-dashboard.js"></script>
</head>
<body onload="textareaSizor()">
    <div class="container">
        <div class="nav">
            <div class="website">
                <h1>HouseSearchKE.com</h1>
            </div>
            <div class="admin">
                <h3><?php echo $adminFirst_Name . " " . $adminLast_Name;?></h3>
                <a class="sign-out-button" href="../Html/index.html" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Sign Out</a>
            </div>
        </div>
        <div class="control-panel">
            <button id="my-contact-information-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#my-contact-information-button', '.control-panel button', '.contact-information', '.property-owners-container, .rentals, .administrators, .queries', 'flex', 'row')">My Contact Information</button>

            <button id="property-owners-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#property-owners-button', '.control-panel button', '.property-owners-container', '.contact-information, .rentals, .administrators, .queries', 'flex', null)">Property Owners</button>

            <button id="rentals-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#rentals-button', '.control-panel button', '.rentals', '.contact-information, .property-owners-container, .administrators, .queries', 'flex', null)">Rentals</button>

            <button id="administrators-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#administrators-button', '.control-panel button', '.administrators', '.contact-information, .property-owners-container, .rentals, .queries', 'flex', null)">Administrators</button>

            <button id="queries-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#queries-button', '.control-panel button', '.queries', '.contact-information, .property-owners-container, .rentals, .administrators', 'flex', null)">Queries</button>
        </div>
        <div class="property-owners-container">
            <div class="top-property-owners-section">
                <?php
                    if (gettype($property_owners) !== "NULL") {
                        echo '
                        <div class="property-owners-table-and-print">
                            <form action="../Php/editPropertyOwnerDetailsFromAdmin.php" method="post" onsubmit="confirmPropertyOwnerEdit(event)">
                                <table class="property-owners-table">
                                    <thead>
                                        <tr>
                                            <th colspan="8" id="property-owners-table-title">Property Owners</th>
                                        </tr>
                                        <tr>
                                            <th id="property-owners-table-column-heads">Phone Number</th>
                                            <th id="property-owners-table-column-heads">Email Address</th>
                                            <th id="property-owners-table-column-heads">Password</th>
                                            <th id="property-owners-table-column-heads">First Name</th>
                                            <th id="property-owners-table-column-heads">Last Name</th>
                                            <th id="property-owners-table-column-heads">Rentals Owned</th>
                                            <th id="property-owners-table-column-heads">Password Reset Confirmation Codes</th>
                                            <th id="property-owners-table-column-heads">Remember Me Tokens</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                    for ($i = 0; $i < count($property_owners); $i++) {
                                        echo '
                                            <tr>
                                                <td><input type="text" name="phone-number" value="' . $property_owners[$i][0] . '" disabled></td>
                                                <td><input type="text" name="email-address" value="' . $property_owners[$i][1] . '" disabled></td>
                                                <td><input type="text" name="password" value="' . $property_owners[$i][2] . '" disabled></td>
                                                <td><input type="text" name="first-name" value="' . $property_owners[$i][3] . '" disabled></td>
                                                <td><input type="text" name="last-name" value="' . $property_owners[$i][4] . '" disabled></td>
                                                <td><input type="text" name="rentals-owned" value="' . $property_owners[$i][5] . '" disabled></td>
                                                <td><input type="text" name="password-reset-confirmation-code" value="' . $property_owners[$i][6] . '" disabled></td>
                                                <td><input type="text" name="remember-me-token" value="' . $property_owners[$i][7] . '" disabled></td>
                                                <td class="edit-details">
                                                    <button class="property-owners-table-edit-details-button" onclick="editDetails(event, \'.property-owners-table input[type=text]\', \'.property-owners-table .submit-details\', \'.property-owners-table .edit-details\')" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                        <img src="../Images/edit.png" alt="edit-button">
                                                    </button>
                                                </td>
                                                <td class="submit-details" id="submit-details-' . ($i + 1) . '">
                                                    <input type="hidden" name="original-phone-number" value="' . $property_owners[$i][0] . '" disabled>
                                                    <input type="hidden" name="original-email-address" value="' . $property_owners[$i][1] . '" disabled>
                                                    <input type="hidden" name="original-password" value="' . $property_owners[$i][2] . '" disabled>
                                                    <input type="hidden" name="original-first-name" value="' . $property_owners[$i][3] . '" disabled>
                                                    <input type="hidden" name="original-last-name" value="' . $property_owners[$i][4] . '" disabled>
                                                    <input type="hidden" name="original-rentals-owned" value="' . $property_owners[$i][5] . '" disabled>
                                                    <input type="hidden" name="original-password-reset-confirmation-code" value="' . $property_owners[$i][6] . '" disabled>
                                                    <input type="hidden" name="original-remember-me-token" value="' . $property_owners[$i][7] . '" disabled>
                                                    <input type="hidden" name="email" value="' . $email . '">
                                                    <input type="hidden" name="passwordField" value="' . $password . '">';

                                                    if(isset($administrators)){echo '<input type="hidden" name="administrators" value="' . htmlspecialchars(json_encode($administrators)) .'">';}
                                                    if(isset($property_owners)){echo '<input type="hidden" name="property-owners" value="' .htmlspecialchars(json_encode($property_owners)) .'">';}
                                                    if(isset($hostels)){echo '<input type="hidden" name="hostels" value="' .htmlspecialchars(json_encode($hostels)) .'">';}
                                                    if(isset($singlerooms)){echo '<input type="hidden" name="single-rooms" value="' .htmlspecialchars(json_encode($singlerooms)) .'">';}
                                                    if(isset($bedsitters)){echo '<input type="hidden" name="bedsitters" value="' .htmlspecialchars(json_encode($bedsitters)) .'">';}
                                                    if(isset($apartments)){echo '<input type="hidden" name="apartments" value="' .htmlspecialchars(json_encode($apartments)) .'">';}
                                                    if(isset($houses)){echo '<input type="hidden" name="houses" value="' .htmlspecialchars(json_encode($houses)) .'">';}
                                                    if(isset($businesspremises)){echo '<input type="hidden" name="business-premises" value="' .htmlspecialchars(json_encode($businesspremises)) .'">';}
                                                    if(isset($suites)){echo '<input type="hidden" name="suites" value="' .htmlspecialchars(json_encode($suites)) .'">';}

                                                echo '
                                                    <td class="submit-details">
                                                        <button type="submit" class="property-owners-table-submit-details-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                            <img src="../Images/submit.png" alt="submit details">
                                                        </button>
                                                    </td>
                                                </td>
                                            </tr>';
                                    }
                        echo '
                                    </tbody>
                                </table>
                            </form>

                            <form class="print-property-owners-table" action="../Php/table-pdf.php" method="post">
                                <input type="hidden" name="property-owners" value="' . htmlspecialchars(json_encode($property_owners)) . '">
                                <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Print Table</button>
                            </form>
                        </div>';

                        echo '
                        <div class="password-hasher-form-div">
                            <form class="password-hasher" action="../Php/password-hasher.php" method="post">
                                <div class="password-hasher-title">
                                    <h4>Password Hasher</h4>
                                </div>
                                <div class="password-input">
                                    <label for="password-to-hash">Password</label>
                                    <input type="text" oninput="textareaSizor()" name="password-to-hash" id="password-to-hash"';
                        if (isset($newPassword)) {
                            echo 'value="' . $newPassword . '">';
                        } else {
                            echo '>';
                        }
                        echo '
                                </div>
                                <div class="hashed-password">
                                    <label for="">Hashed Password</label>
                                    <input type="text" name="hashed-password-return" id="hashed-password-return"';
                        if (isset($hashedPassword)) {
                            echo 'value="' . $hashedPassword . '">';
                        } else {
                            echo 'disabled>';
                        }
                        echo '
                                </div>
                                <div class="hash-button">';

                                    if(isset($administrators)){echo '<input type="hidden" name="administrators" value="' . htmlspecialchars(json_encode($administrators)) .'">';}
                                    if(isset($property_owners)){echo '<input type="hidden" name="property-owners" value="' .htmlspecialchars(json_encode($property_owners)) .'">';}
                                    if(isset($hostels)){echo '<input type="hidden" name="hostels" value="' .htmlspecialchars(json_encode($hostels)) .'">';}
                                    if(isset($singlerooms)){echo '<input type="hidden" name="single-rooms" value="' .htmlspecialchars(json_encode($singlerooms)) .'">';}
                                    if(isset($bedsitters)){echo '<input type="hidden" name="bedsitters" value="' .htmlspecialchars(json_encode($bedsitters)) .'">';}
                                    if(isset($apartments)){echo '<input type="hidden" name="apartments" value="' .htmlspecialchars(json_encode($apartments)) .'">';}
                                    if(isset($houses)){echo '<input type="hidden" name="houses" value="' .htmlspecialchars(json_encode($houses)) .'">';}
                                    if(isset($businesspremises)){echo '<input type="hidden" name="business-premises" value="' .htmlspecialchars(json_encode($businesspremises)) .'">';}
                                    if(isset($suites)){echo '<input type="hidden" name="suites" value="' .htmlspecialchars(json_encode($suites)) .'">';}

                            echo '

                                    <input type="hidden" name="email" value="' . $email . '">
                                    <input type="hidden" name="passwordField" value="' . $password . '">
                                    <input type="hidden" name="admin-first-name" value="' . $adminFirst_Name . '">
                                    <input type="hidden" name="admin-last-name" value="' . $adminLast_Name . '">
                                    <input type="hidden" name="admin-phone-number" value="' . $adminPhone_Number .'">
                                    <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Hash Password</button>
                                </div>
                            </form>
                        </div>';

                    } else {
                        echo "<h3>No One Has Registered As A Property Owner</h3>";
                    }
                ?>
            </div>
            <div class="add-new-property-owner">
                <form id="add-new-property-owner-form" action="../Php/add-new-property-owner.php" method="post" enctype="multipart/form-data" onsubmit="validateForm(event, 'add-new-property-owner-form', '#add-new-property-owner-form')">
                    <div class="add-new-property-owner-title">
                        <h4>Add A New Property Owner</h4>
                    </div>
                    
                    <div class="first-name">
                        <label for="new-property-owner-first-name">First Name:</label>
                        <input type="text" id="new-property-owner-first-name" name="admin-first-name" onblur="validateField('new-property-owner-first-name', 'Please Specify The New Admin\'s First Name', null, 'new-property-owner-first-name', 'new-property-owner-last-name', 'new-property-owner-email', 'new-property-owner-email', 'new-property-owner-email', 'new-property-owner-password', 'new-property-owner-password', 'new-property-owner-password')">
                        <div class="error"></div>
                    </div>
                    <div class="last-name">
                        <label for="new-property-owner-last-name">Last Name:</label>
                        <input type="text" id="new-property-owner-last-name" name="admin-last-name" onblur="validateField('new-property-owner-last-name', 'Please Specify The New Admin\'s Last Name', null, 'new-property-owner-first-name', 'new-property-owner-last-name', 'new-property-owner-email', 'new-property-owner-email', 'new-property-owner-email', 'new-property-owner-password', 'new-property-owner-password', 'new-property-owner-password')">
                        <div class="error"></div>
                    </div>

                    <div class="phone-number">
                        <label for="new-property-owner-phone">Phone Number:</label>
                        <input type="number" id="new-property-owner-phone" name="admin-phone-number" onblur="validatePhoneNumber('submit', 'new-property-owner-phone', 'Please Enter A Phone Number That Will Be Associated With The New Admin\'s Account')">
                        <div class="error"></div>
                    </div>
                    
                    <div class="email">
                        <label for="new-property-owner-email">Email Address:</label>
                        <input type="text" id="new-property-owner-email" name="admin-modified-email" onblur="validateField('new-property-owner-email', 'Please Specify An Email that will be Associated With The New Admin\'s Rentals', null, 'new-property-owner-first-name', 'new-property-owner-last-name', 'new-property-owner-email', 'new-property-owner-email', 'new-property-owner-email', 'new-property-owner-password', 'new-property-owner-password', 'new-property-owner-password')">
                        <div class="error"></div>
                    </div>

                    <div class="password">
                        <label for="new-property-owner-password">Password:</label>
                        <input type="password" id="new-property-owner-password" name="admin-password" onblur="validateField('new-property-owner-password', 'Please Enter A Password To Secure The New Admin\'s Account', null, 'new-property-owner-first-name', 'new-property-owner-last-name', 'new-property-owner-email', 'new-property-owner-email', 'new-property-owner-email', 'new-property-owner-password', 'new-property-owner-password', 'new-property-owner-password')" placeholder="Un-encrypted Password">
                        <div class="error"></div>
                    </div>

                    <div class="show-pass">
                        <input type="checkbox" id="new-property-owner-show-pass" tabindex="0" onclick="toggleShowPassword('new-property-owner-show-pass', 'new-property-owner-password')">
                        <label for="new-property-owner-show-pass">Show Password</label>
                    </div>
                    
                    <input type="hidden" name="retrieved-email" value="<?php echo $email;?>">
                    <input type="hidden" name="retrieved-phone-number" value="<?php echo $adminPhone_Number;?>">
                    <input type="hidden" name="retrieved-password" value="<?php echo $password;?>">
                    <input type="hidden" name="passwordField" value="<?php echo $password;?>">

                    <?php if(isset($administrators)){echo '<input type="hidden" name="administrators" value="' . htmlspecialchars(json_encode($administrators)) .'">';}?>
                    <?php if(isset($property_owners)){echo '<input type="hidden" name="property-owners" value="' .htmlspecialchars(json_encode($property_owners)) .'">';}?>
                    <?php if(isset($hostels)){echo '<input type="hidden" name="hostels" value="' .htmlspecialchars(json_encode($hostels)) .'">';}?>
                    <?php if(isset($singlerooms)){echo '<input type="hidden" name="single-rooms" value="' .htmlspecialchars(json_encode($singlerooms)) .'">';}?>
                    <?php if(isset($bedsitters)){echo '<input type="hidden" name="bedsitters" value="' .htmlspecialchars(json_encode($bedsitters)) .'">';}?>
                    <?php if(isset($apartments)){echo '<input type="hidden" name="apartments" value="' .htmlspecialchars(json_encode($apartments)) .'">';}?>
                    <?php if(isset($houses)){echo '<input type="hidden" name="houses" value="' .htmlspecialchars(json_encode($houses)) .'">';}?>
                    <?php if(isset($businesspremises)){echo '<input type="hidden" name="business-premises" value="' .htmlspecialchars(json_encode($businesspremises)) .'">';}?>
                    <?php if(isset($suites)){echo '<input type="hidden" name="suites" value="' .htmlspecialchars(json_encode($suites)) .'">';}?>

                    <input type="hidden" name="retrieved-admin-first-name" value="<?php echo $adminFirst_Name;?>">
                    <input type="hidden" name="retrieved-admin-last-name" value="<?php echo $adminLast_Name;?>">

                    <div class="add-new-property-owner-confirm-button">
                        <button type="submit" tabindex="0" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Confirm Details</button>
                    </div>                       
                </form> 
            </div>
        </div>
        <div class="rentals">
            <div class="rental-buttons">
                <button id="hostels-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#hostels-button', '.rental-buttons button', '.hostels', '.single-rooms, .bedsitters, .apartments, .houses, .business-premises, .suites', 'flex', null)">Hostels</button>

                <button id="single-rooms-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#single-rooms-button', '.rental-buttons button', '.single-rooms', '.hostels, .bedsitters, .apartments, .houses, .business-premises, .suites', 'flex', null)">Single Rooms</button>

                <button id="bedsitters-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#bedsitters-button', '.rental-buttons button', '.bedsitters', '.hostels, .single-rooms, .apartments, .houses, .business-premises, .suites', 'flex', null)">Bedsitters</button>

                <button id="apartments-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#apartments-button', '.rental-buttons button', '.apartments', '.hostels, .single-rooms, .bedsitters, .houses, .business-premises, .suites', 'flex', null)">Apartments</button>

                <button id="houses-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#houses-button', '.rental-buttons button', '.houses', '.hostels, .single-rooms, .bedsitters, .apartments, .business-premises, .suites', 'flex', null)">Houses</button>

                <button id="business-premises-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#business-premises-button', '.rental-buttons button', '.business-premises', '.hostels, .single-rooms, .bedsitters, .apartments, .houses, .suites', 'flex', null)">Business Premises</button>

                <button id="suites-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#suites-button', '.rental-buttons button', '.suites', '.hostels, .single-rooms, .bedsitters, .apartments, .houses, .business-premises', 'flex', null)">Suites</button>
            </div>
            <div class="actual-rentals">
                <div class="hostels">
                    <?php
                        if (gettype($hostels) !== "NULL") {
                            echo '
                            <div class="hostels-table-and-print">
                                <form action="" method="post" onsubmit="confirmAdministratorEdit(event)">
                                    <table class="hostels-table">
                                        <thead>
                                            <tr>
                                                <th colspan="7" id="hostels-table-title">Hostels</th>
                                            </tr>
                                            <tr>
                                                <th id="hostels-table-column-heads">Rental ID</th>
                                                <th id="hostels-table-column-heads">Rental Name</th>
                                                <th id="hostels-table-column-heads">Location</th>
                                                <th id="hostels-table-column-heads">Google Location</th>
                                                <th id="hostels-table-column-heads">Image Urls</th>
                                                <th id="hostels-table-column-heads">Ammenities</th>
                                                <th id="hostels-table-column-heads">Number Of Units</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                        for ($i = 0; $i < count($hostels); $i++) {
                                            echo '
                                                <tr>
                                                    <td><input type="text" name="rental-id" value="' . $hostels[$i][0] . '" disabled></td>
                                                    <td><input type="text" name="rental-name" value="' . $hostels[$i][1] . '" disabled></td>
                                                    <td><input type="text" name="location" value="' . $hostels[$i][2] . '" disabled></td>
                                                    <td><input type="text" name="google-location" value="' . $hostels[$i][3] . '" disabled></td>
                                                    <td><input type="text" name="image-urls" value="' . $hostels[$i][4] . '" disabled></td>
                                                    <td><input type="text" name="ammenities" value="' . $hostels[$i][5] . '" disabled></td>
                                                    <td><input type="text" name="number-of-units" value="' . $hostels[$i][6] . '" disabled></td>
                                                    <td class="edit-details">
                                                        <button class="hostels-table-edit-details-button" onclick="editDetails(event, \'.hostels-table input[type=text]\', \'.hostels-table .submit-details\', \'.hostels-table .edit-details\')" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                            <img src="../Images/edit.png" alt="edit-button">
                                                        </button>
                                                    </td>
                                                    <td class="submit-details" id="submit-details-' . ($i + 1) . '">
                                                        <input type="hidden" name="original-rental-id" value="' . $hostels[$i][0] . '" disabled>
                                                        <input type="hidden" name="original-rental-name" value="' . $hostels[$i][1] . '" disabled>
                                                        <input type="hidden" name="original-location" value="' . $hostels[$i][2] . '" disabled>
                                                        <input type="hidden" name="original-google-location" value="' . $hostels[$i][3] . '" disabled>
                                                        <input type="hidden" name="original-image-urls" value="' . $hostels[$i][4] . '" disabled>
                                                        <input type="hidden" name="original-ammenities" value="' . $hostels[$i][5] . '" disabled>
                                                        <input type="hidden" name="original-number-of-units" value="' . $hostels[$i][6] . '" disabled>
                                                        <input type="hidden" name="email" value="' . $email . '">
                                                        <input type="hidden" name="passwordField" value="' . $password . '">';

                                                        if(isset($administrators)){echo '<input type="hidden" name="administrators" value="' . htmlspecialchars(json_encode($administrators)) .'">';}
                                                        if(isset($property_owners)){echo '<input type="hidden" name="property-owners" value="' .htmlspecialchars(json_encode($property_owners)) .'">';}
                                                        if(isset($hostels)){echo '<input type="hidden" name="hostels" value="' .htmlspecialchars(json_encode($hostels)) .'">';}
                                                        if(isset($singlerooms)){echo '<input type="hidden" name="single-rooms" value="' .htmlspecialchars(json_encode($singlerooms)) .'">';}
                                                        if(isset($bedsitters)){echo '<input type="hidden" name="bedsitters" value="' .htmlspecialchars(json_encode($bedsitters)) .'">';}
                                                        if(isset($apartments)){echo '<input type="hidden" name="apartments" value="' .htmlspecialchars(json_encode($apartments)) .'">';}
                                                        if(isset($houses)){echo '<input type="hidden" name="houses" value="' .htmlspecialchars(json_encode($houses)) .'">';}
                                                        if(isset($businesspremises)){echo '<input type="hidden" name="business-premises" value="' .htmlspecialchars(json_encode($businesspremises)) .'">';}
                                                        if(isset($suites)){echo '<input type="hidden" name="suites" value="' .htmlspecialchars(json_encode($suites)) .'">';}
    
                                                    echo '
                                                        <td class="submit-details">
                                                            <button type="submit" class="hostels-table-submit-details-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                                <img src="../Images/submit.png" alt="submit details">
                                                            </button>
                                                        </td>
                                                    </td>
                                                </tr>';
                                        }
                            echo '
                                        </tbody>
                                    </table>
                                </form>

                            
                                <form class="print-hostels-table" action="../Php/hostels-table-pdf.php" method="post">
                                    <input type="hidden" name="hostels" value="' . htmlspecialchars(json_encode($hostels)) . '">
                                    <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Print Table</button>
                                </form>
                            </div>';
                        } else {
                            echo "<h3>No One Has Registered As A Property Owner</h3>";
                        }
                    ?>
                </div>
                <div class="single-rooms">
                    <?php
                        if (gettype($singlerooms) !== "NULL") {
                            echo '
                            <div class="single-rooms-table-and-print">
                                <form action="" method="post" onsubmit="confirmAdministratorEdit(event)">
                                    <table class="single-rooms-table">
                                        <thead>
                                            <tr>
                                                <th colspan="7" id="single-rooms-table-title">Single Rooms</th>
                                            </tr>
                                            <tr>
                                                <th id="single-rooms-table-column-heads">Rental ID</th>
                                                <th id="single-rooms-table-column-heads">Rental Name</th>
                                                <th id="single-rooms-table-column-heads">Location</th>
                                                <th id="single-rooms-table-column-heads">Google Location</th>
                                                <th id="single-rooms-table-column-heads">Image Urls</th>
                                                <th id="single-rooms-table-column-heads">Ammenities</th>
                                                <th id="single-rooms-table-column-heads">Number Of Units</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                        for ($i = 0; $i < count($singlerooms); $i++) {
                                            echo '
                                                <tr>
                                                    <td><input type="text" name="rental-id" value="' . $singlerooms[$i][0] . '" disabled></td>
                                                    <td><input type="text" name="rental-name" value="' . $singlerooms[$i][1] . '" disabled></td>
                                                    <td><input type="text" name="location" value="' . $singlerooms[$i][2] . '" disabled></td>
                                                    <td><input type="text" name="google-location" value="' . $singlerooms[$i][3] . '" disabled></td>
                                                    <td><input type="text" name="image-urls" value="' . $singlerooms[$i][4] . '" disabled></td>
                                                    <td><input type="text" name="ammenities" value="' . $singlerooms[$i][5] . '" disabled></td>
                                                    <td><input type="text" name="number-of-units" value="' . $singlerooms[$i][6] . '" disabled></td>
                                                    <td class="edit-details">
                                                        <button class="single-rooms-table-edit-details-button" onclick="editDetails(event, \'.single-rooms-table input[type=text]\', \'.single-rooms-table .submit-details\', \'.single-rooms-table .edit-details\')" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                            <img src="../Images/edit.png" alt="edit-button">
                                                        </button>
                                                    </td>
                                                    <td class="submit-details" id="submit-details-' . ($i + 1) . '">
                                                        <input type="hidden" name="original-rental-id" value="' . $singlerooms[$i][0] . '" disabled>
                                                        <input type="hidden" name="original-rental-name" value="' . $singlerooms[$i][1] . '" disabled>
                                                        <input type="hidden" name="original-location" value="' . $singlerooms[$i][2] . '" disabled>
                                                        <input type="hidden" name="original-google-location" value="' . $singlerooms[$i][3] . '" disabled>
                                                        <input type="hidden" name="original-image-urls" value="' . $singlerooms[$i][4] . '" disabled>
                                                        <input type="hidden" name="original-ammenities" value="' . $singlerooms[$i][5] . '" disabled>
                                                        <input type="hidden" name="original-number-of-units" value="' . $singlerooms[$i][6] . '" disabled>
                                                        <input type="hidden" name="email" value="' . $email . '">
                                                        <input type="hidden" name="passwordField" value="' . $password . '">';

                                                        if(isset($administrators)){echo '<input type="hidden" name="administrators" value="' . htmlspecialchars(json_encode($administrators)) .'">';}
                                                        if(isset($property_owners)){echo '<input type="hidden" name="property-owners" value="' .htmlspecialchars(json_encode($property_owners)) .'">';}
                                                        if(isset($hostels)){echo '<input type="hidden" name="hostels" value="' .htmlspecialchars(json_encode($hostels)) .'">';}
                                                        if(isset($singlerooms)){echo '<input type="hidden" name="single-rooms" value="' .htmlspecialchars(json_encode($singlerooms)) .'">';}
                                                        if(isset($bedsitters)){echo '<input type="hidden" name="bedsitters" value="' .htmlspecialchars(json_encode($bedsitters)) .'">';}
                                                        if(isset($apartments)){echo '<input type="hidden" name="apartments" value="' .htmlspecialchars(json_encode($apartments)) .'">';}
                                                        if(isset($houses)){echo '<input type="hidden" name="houses" value="' .htmlspecialchars(json_encode($houses)) .'">';}
                                                        if(isset($businesspremises)){echo '<input type="hidden" name="business-premises" value="' .htmlspecialchars(json_encode($businesspremises)) .'">';}
                                                        if(isset($suites)){echo '<input type="hidden" name="suites" value="' .htmlspecialchars(json_encode($suites)) .'">';}
    
                                                    echo '
                                                        <td class="submit-details">
                                                            <button type="submit" class="single-rooms-table-submit-details-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                                <img src="../Images/submit.png" alt="submit details">
                                                            </button>
                                                        </td>
                                                    </td>
                                                </tr>';
                                        }
                            echo '
                                        </tbody>
                                    </table>
                                </form>

                            
                                <form class="print-single-rooms-table" action="../Php/single-rooms-table-pdf.php" method="post">
                                    <input type="hidden" name="single-rooms" value="' . htmlspecialchars(json_encode($singlerooms)) . '">
                                    <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Print Table</button>
                                </form>
                            </div>';
                        } else {
                            echo "<h3>No One Has Registered As A Property Owner</h3>";
                        }
                    ?>
                </div>
                <div class="bedsitters">
                    <?php
                        if (gettype($bedsitters) !== "NULL") {
                            echo '
                            <div class="bedsitters-table-and-print">
                                <form action="" method="post" onsubmit="confirmAdministratorEdit(event)">
                                    <table class="bedsitters-table">
                                        <thead>
                                            <tr>
                                                <th colspan="7" id="bedsitters-table-title">Bedsitters</th>
                                            </tr>
                                            <tr>
                                                <th id="bedsitters-table-column-heads">Rental ID</th>
                                                <th id="bedsitters-table-column-heads">Rental Name</th>
                                                <th id="bedsitters-table-column-heads">Location</th>
                                                <th id="bedsitters-table-column-heads">Google Location</th>
                                                <th id="bedsitters-table-column-heads">Image Urls</th>
                                                <th id="bedsitters-table-column-heads">Ammenities</th>
                                                <th id="bedsitters-table-column-heads">Number Of Units</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                        for ($i = 0; $i < count($bedsitters); $i++) {
                                            echo '
                                                <tr>
                                                    <td><input type="text" name="rental-id" value="' . $bedsitters[$i][0] . '" disabled></td>
                                                    <td><input type="text" name="rental-name" value="' . $bedsitters[$i][1] . '" disabled></td>
                                                    <td><input type="text" name="location" value="' . $bedsitters[$i][2] . '" disabled></td>
                                                    <td><input type="text" name="google-location" value="' . $bedsitters[$i][3] . '" disabled></td>
                                                    <td><input type="text" name="image-urls" value="' . $bedsitters[$i][4] . '" disabled></td>
                                                    <td><input type="text" name="ammenities" value="' . $bedsitters[$i][5] . '" disabled></td>
                                                    <td><input type="text" name="number-of-units" value="' . $bedsitters[$i][6] . '" disabled></td>
                                                    <td class="edit-details">
                                                        <button class="bedsitters-table-edit-details-button" onclick="editDetails(event, \'.bedsitters-table input[type=text]\', \'.bedsitters-table .submit-details\', \'.bedsitters-table .edit-details\')" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                            <img src="../Images/edit.png" alt="edit-button">
                                                        </button>
                                                    </td>
                                                    <td class="submit-details" id="submit-details-' . ($i + 1) . '">
                                                        <input type="hidden" name="original-rental-id" value="' . $bedsitters[$i][0] . '" disabled>
                                                        <input type="hidden" name="original-rental-name" value="' . $bedsitters[$i][1] . '" disabled>
                                                        <input type="hidden" name="original-location" value="' . $bedsitters[$i][2] . '" disabled>
                                                        <input type="hidden" name="original-google-location" value="' . $bedsitters[$i][3] . '" disabled>
                                                        <input type="hidden" name="original-image-urls" value="' . $bedsitters[$i][4] . '" disabled>
                                                        <input type="hidden" name="original-ammenities" value="' . $bedsitters[$i][5] . '" disabled>
                                                        <input type="hidden" name="original-number-of-units" value="' . $bedsitters[$i][6] . '" disabled>
                                                        <input type="hidden" name="email" value="' . $email . '">
                                                        <input type="hidden" name="passwordField" value="' . $password . '">';

                                                        if(isset($administrators)){echo '<input type="hidden" name="administrators" value="' . htmlspecialchars(json_encode($administrators)) .'">';}
                                                        if(isset($property_owners)){echo '<input type="hidden" name="property-owners" value="' .htmlspecialchars(json_encode($property_owners)) .'">';}
                                                        if(isset($hostels)){echo '<input type="hidden" name="hostels" value="' .htmlspecialchars(json_encode($hostels)) .'">';}
                                                        if(isset($singlerooms)){echo '<input type="hidden" name="single-rooms" value="' .htmlspecialchars(json_encode($singlerooms)) .'">';}
                                                        if(isset($bedsitters)){echo '<input type="hidden" name="bedsitters" value="' .htmlspecialchars(json_encode($bedsitters)) .'">';}
                                                        if(isset($apartments)){echo '<input type="hidden" name="apartments" value="' .htmlspecialchars(json_encode($apartments)) .'">';}
                                                        if(isset($houses)){echo '<input type="hidden" name="houses" value="' .htmlspecialchars(json_encode($houses)) .'">';}
                                                        if(isset($businesspremises)){echo '<input type="hidden" name="business-premises" value="' .htmlspecialchars(json_encode($businesspremises)) .'">';}
                                                        if(isset($suites)){echo '<input type="hidden" name="suites" value="' .htmlspecialchars(json_encode($suites)) .'">';}
    
                                                    echo '
                                                        <td class="submit-details">
                                                            <button type="submit" class="bedsitters-table-submit-details-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                                <img src="../Images/submit.png" alt="submit details">
                                                            </button>
                                                        </td>
                                                    </td>
                                                </tr>';
                                        }
                            echo '
                                        </tbody>
                                    </table>
                                </form>

                            
                                <form class="print-bedsitters-table" action="../Php/bedsitters-table-pdf.php" method="post">
                                    <input type="hidden" name="bedsitters" value="' . htmlspecialchars(json_encode($bedsitters)) . '">
                                    <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Print Table</button>
                                </form>
                            </div>';
                        } else {
                            echo "<h3>No One Has Registered As A Property Owner</h3>";
                        }
                    ?>
                </div>
                <div class="apartments">
                    <?php
                        if (gettype($apartments) !== "NULL") {
                            echo '
                            <div class="apartments-table-and-print">
                                <form action="" method="post" onsubmit="confirmAdministratorEdit(event)">
                                    <table class="apartments-table">
                                        <thead>
                                            <tr>
                                                <th colspan="8" id="apartments-table-title">Apartments</th>
                                            </tr>
                                            <tr>
                                                <th id="apartments-table-column-heads">Rental ID</th>
                                                <th id="apartments-table-column-heads">Rental Name</th>
                                                <th id="apartments-table-column-heads">Location</th>
                                                <th id="apartments-table-column-heads">Google Location</th>
                                                <th id="apartments-table-column-heads">Image Urls</th>
                                                <th id="apartments-table-column-heads">Ammenities</th>
                                                <th id="apartments-table-column-heads">Number Of Bedrooms</th>
                                                <th id="apartments-table-column-heads">Number Of Units</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                        for ($i = 0; $i < count($apartments); $i++) {
                                            echo '
                                                <tr>
                                                    <td><input type="text" name="rental-id" value="' . $apartments[$i][0] . '" disabled></td>
                                                    <td><input type="text" name="rental-name" value="' . $apartments[$i][1] . '" disabled></td>
                                                    <td><input type="text" name="location" value="' . $apartments[$i][2] . '" disabled></td>
                                                    <td><input type="text" name="google-location" value="' . $apartments[$i][3] . '" disabled></td>
                                                    <td><input type="text" name="image-urls" value="' . $apartments[$i][4] . '" disabled></td>
                                                    <td><input type="text" name="ammenities" value="' . $apartments[$i][5] . '" disabled></td>
                                                    <td><input type="text" name="number-of-bedrooms" value="' . $apartments[$i][6] . '" disabled></td>
                                                    <td><input type="text" name="number-of-units" value="' . $apartments[$i][7] . '" disabled></td>
                                                    <td class="edit-details">
                                                        <button class="apartments-table-edit-details-button" onclick="editDetails(event, \'.apartments-table input[type=text]\', \'.apartments-table .submit-details\', \'.apartments-table .edit-details\')" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                            <img src="../Images/edit.png" alt="edit-button">
                                                        </button>
                                                    </td>
                                                    <td class="submit-details" id="submit-details-' . ($i + 1) . '">
                                                        <input type="hidden" name="original-rental-id" value="' . $apartments[$i][0] . '" disabled>
                                                        <input type="hidden" name="original-rental-name" value="' . $apartments[$i][1] . '" disabled>
                                                        <input type="hidden" name="original-location" value="' . $apartments[$i][2] . '" disabled>
                                                        <input type="hidden" name="original-google-location" value="' . $apartments[$i][3] . '" disabled>
                                                        <input type="hidden" name="original-image-urls" value="' . $apartments[$i][4] . '" disabled>
                                                        <input type="hidden" name="original-ammenities" value="' . $apartments[$i][5] . '" disabled>
                                                        <input type="text" name="original-number-of-bedrooms" value="' . $apartments[$i][6] . '" disabled>
                                                        <input type="hidden" name="original-number-of-units" value="' . $apartments[$i][7] . '" disabled>
                                                        <input type="hidden" name="email" value="' . $email . '">
                                                        <input type="hidden" name="passwordField" value="' . $password . '">';

                                                        if(isset($administrators)){echo '<input type="hidden" name="administrators" value="' . htmlspecialchars(json_encode($administrators)) .'">';}
                                                        if(isset($property_owners)){echo '<input type="hidden" name="property-owners" value="' .htmlspecialchars(json_encode($property_owners)) .'">';}
                                                        if(isset($hostels)){echo '<input type="hidden" name="hostels" value="' .htmlspecialchars(json_encode($hostels)) .'">';}
                                                        if(isset($singlerooms)){echo '<input type="hidden" name="single-rooms" value="' .htmlspecialchars(json_encode($singlerooms)) .'">';}
                                                        if(isset($bedsitters)){echo '<input type="hidden" name="bedsitters" value="' .htmlspecialchars(json_encode($bedsitters)) .'">';}
                                                        if(isset($apartments)){echo '<input type="hidden" name="apartments" value="' .htmlspecialchars(json_encode($apartments)) .'">';}
                                                        if(isset($houses)){echo '<input type="hidden" name="houses" value="' .htmlspecialchars(json_encode($houses)) .'">';}
                                                        if(isset($businesspremises)){echo '<input type="hidden" name="business-premises" value="' .htmlspecialchars(json_encode($businesspremises)) .'">';}
                                                        if(isset($suites)){echo '<input type="hidden" name="suites" value="' .htmlspecialchars(json_encode($suites)) .'">';}
    
                                                    echo '
                                                        <td class="submit-details">
                                                            <button type="submit" class="apartments-table-submit-details-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                                <img src="../Images/submit.png" alt="submit details">
                                                            </button>
                                                        </td>
                                                    </td>
                                                </tr>';
                                        }
                            echo '
                                        </tbody>
                                    </table>
                                </form>

                            
                                <form class="print-apartments-table" action="../Php/apartments-table-pdf.php" method="post">
                                    <input type="hidden" name="apartments" value="' . htmlspecialchars(json_encode($apartments)) . '">
                                    <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Print Table</button>
                                </form>
                            </div>';
                        } else {
                            echo "<h3>No One Has Registered As A Property Owner</h3>";
                        }
                    ?>
                </div>
                <div class="houses">
                    <?php
                        if (gettype($houses) !== "NULL") {
                            echo '
                            <div class="houses-table-and-print">
                                <form action="" method="post" onsubmit="confirmAdministratorEdit(event)">
                                    <table class="houses-table">
                                        <thead>
                                            <tr>
                                                <th colspan="8" id="houses-table-title">Houses</th>
                                            </tr>
                                            <tr>
                                                <th id="houses-table-column-heads">Rental ID</th>
                                                <th id="houses-table-column-heads">Rental Name</th>
                                                <th id="houses-table-column-heads">Location</th>
                                                <th id="houses-table-column-heads">Google Location</th>
                                                <th id="houses-table-column-heads">Image Urls</th>
                                                <th id="houses-table-column-heads">Ammenities</th>
                                                <th id="houses-table-column-heads">Number Of Bedrooms</th>
                                                <th id="houses-table-column-heads">Number Of Units</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                        for ($i = 0; $i < count($houses); $i++) {
                                            echo '
                                                <tr>
                                                    <td><input type="text" name="rental-id" value="' . $houses[$i][0] . '" disabled></td>
                                                    <td><input type="text" name="rental-name" value="' . $houses[$i][1] . '" disabled></td>
                                                    <td><input type="text" name="location" value="' . $houses[$i][2] . '" disabled></td>
                                                    <td><input type="text" name="google-location" value="' . $houses[$i][3] . '" disabled></td>
                                                    <td><input type="text" name="image-urls" value="' . $houses[$i][4] . '" disabled></td>
                                                    <td><input type="text" name="ammenities" value="' . $houses[$i][5] . '" disabled></td>
                                                    <td><input type="text" name="number-of-bedrooms" value="' . $houses[$i][6] . '" disabled></td>
                                                    <td><input type="text" name="number-of-units" value="' . $houses[$i][7] . '" disabled></td>
                                                    <td class="edit-details">
                                                        <button class="houses-table-edit-details-button" onclick="editDetails(event, \'.houses-table input[type=text]\', \'.houses-table .submit-details\', \'.houses-table .edit-details\')" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                            <img src="../Images/edit.png" alt="edit-button">
                                                        </button>
                                                    </td>
                                                    <td class="submit-details" id="submit-details-' . ($i + 1) . '">
                                                        <input type="hidden" name="original-rental-id" value="' . $houses[$i][0] . '" disabled>
                                                        <input type="hidden" name="original-rental-name" value="' . $houses[$i][1] . '" disabled>
                                                        <input type="hidden" name="original-location" value="' . $houses[$i][2] . '" disabled>
                                                        <input type="hidden" name="original-google-location" value="' . $houses[$i][3] . '" disabled>
                                                        <input type="hidden" name="original-image-urls" value="' . $houses[$i][4] . '" disabled>
                                                        <input type="hidden" name="original-ammenities" value="' . $houses[$i][5] . '" disabled>
                                                        <input type="text" name="original-number-of-bedrooms" value="' . $houses[$i][6] . '" disabled>
                                                        <input type="hidden" name="original-number-of-units" value="' . $houses[$i][7] . '" disabled>
                                                        <input type="hidden" name="email" value="' . $email . '">
                                                        <input type="hidden" name="passwordField" value="' . $password . '">';

                                                        if(isset($administrators)){echo '<input type="hidden" name="administrators" value="' . htmlspecialchars(json_encode($administrators)) .'">';}
                                                        if(isset($property_owners)){echo '<input type="hidden" name="property-owners" value="' .htmlspecialchars(json_encode($property_owners)) .'">';}
                                                        if(isset($hostels)){echo '<input type="hidden" name="hostels" value="' .htmlspecialchars(json_encode($hostels)) .'">';}
                                                        if(isset($singlerooms)){echo '<input type="hidden" name="single-rooms" value="' .htmlspecialchars(json_encode($singlerooms)) .'">';}
                                                        if(isset($bedsitters)){echo '<input type="hidden" name="bedsitters" value="' .htmlspecialchars(json_encode($bedsitters)) .'">';}
                                                        if(isset($apartments)){echo '<input type="hidden" name="apartments" value="' .htmlspecialchars(json_encode($apartments)) .'">';}
                                                        if(isset($houses)){echo '<input type="hidden" name="houses" value="' .htmlspecialchars(json_encode($houses)) .'">';}
                                                        if(isset($businesspremises)){echo '<input type="hidden" name="business-premises" value="' .htmlspecialchars(json_encode($businesspremises)) .'">';}
                                                        if(isset($suites)){echo '<input type="hidden" name="suites" value="' .htmlspecialchars(json_encode($suites)) .'">';}
    
                                                    echo '
                                                        <td class="submit-details">
                                                            <button type="submit" class="houses-table-submit-details-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                                <img src="../Images/submit.png" alt="submit details">
                                                            </button>
                                                        </td>
                                                    </td>
                                                </tr>';
                                        }
                            echo '
                                        </tbody>
                                    </table>
                                </form>

                            
                                <form class="print-houses-table" action="../Php/houses-table-pdf.php" method="post">
                                    <input type="hidden" name="houses" value="' . htmlspecialchars(json_encode($houses)) . '">
                                    <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Print Table</button>
                                </form>
                            </div>';
                        } else {
                            echo "<h3>No One Has Registered As A Property Owner</h3>";
                        }
                    ?>
                </div>
                <div class="business-premises">
                    <?php
                        if (gettype($businesspremises) !== "NULL") {
                            echo '
                            <div class="business-premises-table-and-print">
                                <form action="" method="post" onsubmit="confirmAdministratorEdit(event)">
                                    <table class="business-premises-table">
                                        <thead>
                                            <tr>
                                                <th colspan="8" id="business-premises-table-title">Business Premises</th>
                                            </tr>
                                            <tr>
                                                <th id="business-premises-table-column-heads">Rental ID</th>
                                                <th id="business-premises-table-column-heads">Rental Name</th>
                                                <th id="business-premises-table-column-heads">Type_Of_Premise</th>
                                                <th id="business-premises-table-column-heads">Location</th>
                                                <th id="business-premises-table-column-heads">Google Location</th>
                                                <th id="business-premises-table-column-heads">Image Urls</th>
                                                <th id="business-premises-table-column-heads">Ammenities</th>
                                                <th id="business-premises-table-column-heads">Number Of Units</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                        for ($i = 0; $i < count($businesspremises); $i++) {
                                            echo '
                                                <tr>
                                                    <td><input type="text" name="rental-id" value="' . $businesspremises[$i][0] . '" disabled></td>
                                                    <td><input type="text" name="rental-name" value="' . $businesspremises[$i][1] . '" disabled></td>
                                                    <td><input type="text" name="type-of-premise" value="' . $businesspremises[$i][2] . '" disabled></td>
                                                    <td><input type="text" name="location" value="' . $businesspremises[$i][3] . '" disabled></td>
                                                    <td><input type="text" name="google-location" value="' . $businesspremises[$i][4] . '" disabled></td>
                                                    <td><input type="text" name="image-urls" value="' . $businesspremises[$i][5] . '" disabled></td>
                                                    <td><input type="text" name="ammenities" value="' . $businesspremises[$i][6] . '" disabled></td>
                                                    <td><input type="text" name="number-of-units" value="' . $businesspremises[$i][7] . '" disabled></td>
                                                    <td class="edit-details">
                                                        <button class="business-premises-table-edit-details-button" onclick="editDetails(event, \'.business-premises-table input[type=text]\', \'.business-premises-table .submit-details\', \'.business-premises-table .edit-details\')" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                            <img src="../Images/edit.png" alt="edit-button">
                                                        </button>
                                                    </td>
                                                    <td class="submit-details" id="submit-details-' . ($i + 1) . '">
                                                        <input type="hidden" name="original-rental-id" value="' . $businesspremises[$i][0] . '" disabled>
                                                        <input type="hidden" name="original-rental-name" value="' . $businesspremises[$i][1] . '" disabled>
                                                        <input type="hidden" name="original-type-of-premise" value="' . $businesspremises[$i][2] . '" disabled>
                                                        <input type="hidden" name="original-location" value="' . $businesspremises[$i][3] . '" disabled>
                                                        <input type="hidden" name="original-google-location" value="' . $businesspremises[$i][4] . '" disabled>
                                                        <input type="hidden" name="original-image-urls" value="' . $businesspremises[$i][5] . '" disabled>
                                                        <input type="hidden" name="original-ammenities" value="' . $businesspremises[$i][6] . '" disabled>
                                                        <input type="hidden" name="original-number-of-units" value="' . $businesspremises[$i][7] . '" disabled>
                                                        <input type="hidden" name="email" value="' . $email . '">
                                                        <input type="hidden" name="passwordField" value="' . $password . '">';

                                                        if(isset($administrators)){echo '<input type="hidden" name="administrators" value="' . htmlspecialchars(json_encode($administrators)) .'">';}
                                                        if(isset($property_owners)){echo '<input type="hidden" name="property-owners" value="' .htmlspecialchars(json_encode($property_owners)) .'">';}
                                                        if(isset($hostels)){echo '<input type="hidden" name="hostels" value="' .htmlspecialchars(json_encode($hostels)) .'">';}
                                                        if(isset($singlerooms)){echo '<input type="hidden" name="single-rooms" value="' .htmlspecialchars(json_encode($singlerooms)) .'">';}
                                                        if(isset($bedsitters)){echo '<input type="hidden" name="bedsitters" value="' .htmlspecialchars(json_encode($bedsitters)) .'">';}
                                                        if(isset($apartments)){echo '<input type="hidden" name="apartments" value="' .htmlspecialchars(json_encode($apartments)) .'">';}
                                                        if(isset($houses)){echo '<input type="hidden" name="houses" value="' .htmlspecialchars(json_encode($houses)) .'">';}
                                                        if(isset($businesspremises)){echo '<input type="hidden" name="business-premises" value="' .htmlspecialchars(json_encode($businesspremises)) .'">';}
                                                        if(isset($suites)){echo '<input type="hidden" name="suites" value="' .htmlspecialchars(json_encode($suites)) .'">';}
    
                                                    echo '
                                                        <td class="submit-details">
                                                            <button type="submit" class="business-premises-table-submit-details-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                                <img src="../Images/submit.png" alt="submit details">
                                                            </button>
                                                        </td>
                                                    </td>
                                                </tr>';
                                        }
                            echo '
                                        </tbody>
                                    </table>
                                </form>

                            
                                <form class="print-business-premises-table" action="../Php/business-premises-table-pdf.php" method="post">
                                    <input type="hidden" name="business-premises" value="' . htmlspecialchars(json_encode($businesspremises)) . '">
                                    <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Print Table</button>
                                </form>
                            </div>';
                        } else {
                            echo "<h3>No One Has Registered As A Property Owner</h3>";
                        }
                    ?>
                </div>
                <div class="suites">
                    <?php
                        if (gettype($suites) !== "NULL") {
                            echo '
                            <div class="suites-table-and-print">
                                <form action="" method="post" onsubmit="confirmAdministratorEdit(event)">
                                    <table class="suites-table">
                                        <thead>
                                            <tr>
                                                <th colspan="8" id="suites-table-title">Suites</th>
                                            </tr>
                                            <tr>
                                                <th id="suites-table-column-heads">Rental ID</th>
                                                <th id="suites-table-column-heads">Rental Name</th>
                                                <th id="suites-table-column-heads">Location</th>
                                                <th id="suites-table-column-heads">Google Location</th>
                                                <th id="suites-table-column-heads">Image Urls</th>
                                                <th id="suites-table-column-heads">Ammenities</th>
                                                <th id="suites-table-column-heads">Number Of Beds</th>
                                                <th id="suites-table-column-heads">Number Of Units</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                        for ($i = 0; $i < count($suites); $i++) {
                                            echo '
                                                <tr>
                                                    <td><input type="text" name="rental-id" value="' . $suites[$i][0] . '" disabled></td>
                                                    <td><input type="text" name="rental-name" value="' . $suites[$i][1] . '" disabled></td>
                                                    <td><input type="text" name="location" value="' . $suites[$i][2] . '" disabled></td>
                                                    <td><input type="text" name="google-location" value="' . $suites[$i][3] . '" disabled></td>
                                                    <td><input type="text" name="image-urls" value="' . $suites[$i][4] . '" disabled></td>
                                                    <td><input type="text" name="ammenities" value="' . $suites[$i][5] . '" disabled></td>
                                                    <td><input type="text" name="number-of-beds" value="' . $suites[$i][6] . '" disabled></td>
                                                    <td><input type="text" name="number-of-units" value="' . $suites[$i][7] . '" disabled></td>
                                                    <td class="edit-details">
                                                        <button class="suites-table-edit-details-button" onclick="editDetails(event, \'.suites-table input[type=text]\', \'.suites-table .submit-details\', \'.suites-table .edit-details\')" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                            <img src="../Images/edit.png" alt="edit-button">
                                                        </button>
                                                    </td>
                                                    <td class="submit-details" id="submit-details-' . ($i + 1) . '">
                                                        <input type="hidden" name="original-rental-id" value="' . $suites[$i][0] . '" disabled>
                                                        <input type="hidden" name="original-rental-name" value="' . $suites[$i][1] . '" disabled>
                                                        <input type="hidden" name="original-location" value="' . $suites[$i][2] . '" disabled>
                                                        <input type="hidden" name="original-google-location" value="' . $suites[$i][3] . '" disabled>
                                                        <input type="hidden" name="original-image-urls" value="' . $suites[$i][4] . '" disabled>
                                                        <input type="hidden" name="original-ammenities" value="' . $suites[$i][5] . '" disabled>
                                                        <input type="text" name="original-number-of-beds" value="' . $suites[$i][6] . '" disabled>
                                                        <input type="hidden" name="original-number-of-units" value="' . $suites[$i][7] . '" disabled>
                                                        <input type="hidden" name="email" value="' . $email . '">
                                                        <input type="hidden" name="passwordField" value="' . $password . '">';

                                                        if(isset($administrators)){echo '<input type="hidden" name="administrators" value="' . htmlspecialchars(json_encode($administrators)) .'">';}
                                                        if(isset($property_owners)){echo '<input type="hidden" name="property-owners" value="' .htmlspecialchars(json_encode($property_owners)) .'">';}
                                                        if(isset($hostels)){echo '<input type="hidden" name="hostels" value="' .htmlspecialchars(json_encode($hostels)) .'">';}
                                                        if(isset($singlerooms)){echo '<input type="hidden" name="single-rooms" value="' .htmlspecialchars(json_encode($singlerooms)) .'">';}
                                                        if(isset($bedsitters)){echo '<input type="hidden" name="bedsitters" value="' .htmlspecialchars(json_encode($bedsitters)) .'">';}
                                                        if(isset($apartments)){echo '<input type="hidden" name="apartments" value="' .htmlspecialchars(json_encode($apartments)) .'">';}
                                                        if(isset($houses)){echo '<input type="hidden" name="houses" value="' .htmlspecialchars(json_encode($houses)) .'">';}
                                                        if(isset($businesspremises)){echo '<input type="hidden" name="business-premises" value="' .htmlspecialchars(json_encode($businesspremises)) .'">';}
                                                        if(isset($suites)){echo '<input type="hidden" name="suites" value="' .htmlspecialchars(json_encode($suites)) .'">';}
    
                                                    echo '
                                                        <td class="submit-details">
                                                            <button type="submit" class="suites-table-submit-details-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                                <img src="../Images/submit.png" alt="submit details">
                                                            </button>
                                                        </td>
                                                    </td>
                                                </tr>';
                                        }
                            echo '
                                        </tbody>
                                    </table>
                                </form>

                            
                                <form class="print-suites-table" action="../Php/suites-table-pdf.php" method="post">
                                    <input type="hidden" name="suites" value="' . htmlspecialchars(json_encode($suites)) . '">
                                    <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Print Table</button>
                                </form>
                            </div>';
                        } else {
                            echo "<h3>No One Has Registered As A Property Owner</h3>";
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="queries">
            <h3>Search For:</h5>
            <div class="property-owners-with-some-attribute">
                <h4>Property Owners With Some Attribute</h4>
            </div>
            <div class="rentals-with-some-attribute">
                <h4>Rentals With Some Attribute</h4>
            </div>
        </div>
        <div class="administrators">
            <div class="top-administrators-section">
                <?php
                    if (gettype($administrators) !== "NULL") {
                        echo '
                        <div class="admins-table-and-print">
                            <form action="../Php/editAdministratorDetailsFromAdmin.php" method="post" onsubmit="confirmAdministratorEdit(event)">
                                <table class="administrators-table">
                                    <thead>
                                        <tr>
                                            <th colspan="7" id="administrators-table-title">Administrators</th>
                                        </tr>
                                        <tr>
                                            <th id="administrators-table-column-heads">Phone Number</th>
                                            <th id="administrators-table-column-heads">Email Address</th>
                                            <th id="administrators-table-column-heads">Password</th>
                                            <th id="administrators-table-column-heads">First Name</th>
                                            <th id="administrators-table-column-heads">Last Name</th>
                                            <th id="administrators-table-column-heads">Password Reset Confirmation Codes</th>
                                            <th id="administrators-table-column-heads">Remember Me Tokens</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                    for ($i = 0; $i < count($administrators); $i++) {
                                        echo '
                                            <tr>
                                                <td><input type="text" name="phone-number" value="' . $administrators[$i][0] . '" disabled></td>
                                                <td><input type="text" name="email-address" value="' . $administrators[$i][1] . '" disabled></td>
                                                <td><input type="text" name="password" value="' . $administrators[$i][2] . '" disabled></td>
                                                <td><input type="text" name="first-name" value="' . $administrators[$i][3] . '" disabled></td>
                                                <td><input type="text" name="last-name" value="' . $administrators[$i][4] . '" disabled></td>
                                                <td><input type="text" name="password-reset-confirmation-code" value="' . $administrators[$i][5] . '" disabled></td>
                                                <td><input type="text" name="remember-me-token" value="' . $administrators[$i][6] . '" disabled></td>
                                                <td class="edit-details">
                                                    <button class="administrators-table-edit-details-button" onclick="editDetails(event, \'.administrators-table input[type=text]\', \'.administrators-table .submit-details\', \'.administrators-table .edit-details\')" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                        <img src="../Images/edit.png" alt="edit-button">
                                                    </button>
                                                </td>
                                                <td class="submit-details" id="submit-details-' . ($i + 1) . '">
                                                    <input type="hidden" name="original-phone-number" value="' . $administrators[$i][0] . '" disabled>
                                                    <input type="hidden" name="original-email-address" value="' . $administrators[$i][1] . '" disabled>
                                                    <input type="hidden" name="original-password" value="' . $administrators[$i][2] . '" disabled>
                                                    <input type="hidden" name="original-first-name" value="' . $administrators[$i][3] . '" disabled>
                                                    <input type="hidden" name="original-last-name" value="' . $administrators[$i][4] . '" disabled>
                                                    <input type="hidden" name="original-password-reset-confirmation-code" value="' . $administrators[$i][5] . '" disabled>
                                                    <input type="hidden" name="original-remember-me-token" value="' . $administrators[$i][6] . '" disabled>
                                                    <input type="hidden" name="email" value="' . $email . '">
                                                    <input type="hidden" name="passwordField" value="' . $password . '">';

                                                    if(isset($administrators)){echo '<input type="hidden" name="administrators" value="' . htmlspecialchars(json_encode($administrators)) .'">';}
                                                    if(isset($property_owners)){echo '<input type="hidden" name="property-owners" value="' .htmlspecialchars(json_encode($property_owners)) .'">';}
                                                    if(isset($hostels)){echo '<input type="hidden" name="hostels" value="' .htmlspecialchars(json_encode($hostels)) .'">';}
                                                    if(isset($singlerooms)){echo '<input type="hidden" name="single-rooms" value="' .htmlspecialchars(json_encode($singlerooms)) .'">';}
                                                    if(isset($bedsitters)){echo '<input type="hidden" name="bedsitters" value="' .htmlspecialchars(json_encode($bedsitters)) .'">';}
                                                    if(isset($apartments)){echo '<input type="hidden" name="apartments" value="' .htmlspecialchars(json_encode($apartments)) .'">';}
                                                    if(isset($houses)){echo '<input type="hidden" name="houses" value="' .htmlspecialchars(json_encode($houses)) .'">';}
                                                    if(isset($businesspremises)){echo '<input type="hidden" name="business-premises" value="' .htmlspecialchars(json_encode($businesspremises)) .'">';}
                                                    if(isset($suites)){echo '<input type="hidden" name="suites" value="' .htmlspecialchars(json_encode($suites)) .'">';}

                                                echo '
                                                    <td class="submit-details">
                                                        <button type="submit" class="administrators-table-submit-details-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                            <img src="../Images/submit.png" alt="submit details">
                                                        </button>
                                                    </td>
                                                </td>
                                            </tr>';
                                    }
                        echo '
                                    </tbody>
                                </table>
                            </form>

                        
                            <form class="print-administrators-table" action="../Php/administrators-table-pdf.php" method="post">
                                <input type="hidden" name="administrators" value="' . htmlspecialchars(json_encode($administrators)) . '">
                                <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Print Table</button>
                            </form>
                        </div>';
                            
                        echo '
                        <div class="password-hasher-form-div">
                            <form class="password-hasher" action="../Php/password-hasher.php" method="post">
                                <div class="password-hasher-title">
                                    <h4>Password Hasher</h4>
                                </div>
                                <div class="password-input">
                                    <label for="password-to-hash">Password</label>
                                    <input type="text" oninput="textareaSizor()" name="password-to-hash" id="password-to-hash"';
                        if (isset($newPassword)) {
                            echo 'value="' . $newPassword . '">';
                        } else {
                            echo '>';
                        }
                        echo '
                                </div>
                                <div class="hashed-password">
                                    <label for="">Hashed Password</label>
                                    <input type="text" name="hashed-password-return" id="hashed-password-return"';
                        if (isset($hashedPassword)) {
                            echo 'value="' . $hashedPassword . '">';
                        } else {
                            echo 'disabled>';
                        }
                        echo '
                                </div>
                                <div class="hash-button">';
                                    if(isset($administrators)){echo '<input type="hidden" name="administrators" value="' . htmlspecialchars(json_encode($administrators)) .'">';}
                                    if(isset($property_owners)){echo '<input type="hidden" name="property-owners" value="' .htmlspecialchars(json_encode($property_owners)) .'">';}
                                    if(isset($hostels)){echo '<input type="hidden" name="hostels" value="' .htmlspecialchars(json_encode($hostels)) .'">';}
                                    if(isset($singlerooms)){echo '<input type="hidden" name="single-rooms" value="' .htmlspecialchars(json_encode($singlerooms)) .'">';}
                                    if(isset($bedsitters)){echo '<input type="hidden" name="bedsitters" value="' .htmlspecialchars(json_encode($bedsitters)) .'">';}
                                    if(isset($apartments)){echo '<input type="hidden" name="apartments" value="' .htmlspecialchars(json_encode($apartments)) .'">';}
                                    if(isset($houses)){echo '<input type="hidden" name="houses" value="' .htmlspecialchars(json_encode($houses)) .'">';}
                                    if(isset($businesspremises)){echo '<input type="hidden" name="business-premises" value="' .htmlspecialchars(json_encode($businesspremises)) .'">';}
                                    if(isset($suites)){echo '<input type="hidden" name="suites" value="' .htmlspecialchars(json_encode($suites)) .'">';}
                                echo '

                                    <input type="hidden" name="email" value="' . $email . '">
                                    <input type="hidden" name="passwordField" value="' . $password . '">
                                    <input type="hidden" name="admin-first-name" value="' . $adminFirst_Name . '">
                                    <input type="hidden" name="admin-last-name" value="' . $adminLast_Name . '">
                                    <input type="hidden" name="admin-phone-number" value="' . $adminPhone_Number .'">
                                    <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Hash Password</button>
                                </div>
                            </form>
                        </div>';

                    } else {
                        echo "<h3>No One Has Registered As A Property Owner</h3>";
                    }
                ?>
            </div>
            <div class="add-new-admin">
                <form id="add-new-admin-form" action="../Php/add-new-admin.php" method="post" enctype="multipart/form-data" onsubmit="validateForm(event, 'add-new-admin-form', '#add-new-admin-form')">
                    <div class="add-new-admin-title">
                        <h4>Add A New Administrator</h4>
                    </div>
                    
                    <div class="first-name">
                        <label for="new-admin-first-name">First Name:</label>
                        <input type="text" id="new-admin-first-name" name="admin-first-name" onblur="validateField('new-admin-first-name', 'Please Specify The New Admin\'s First Name', null, 'new-admin-first-name', 'new-admin-last-name', 'new-admin-email', 'new-admin-email', 'new-admin-email', 'new-admin-password', 'new-admin-password', 'new-admin-password')">
                        <div class="error"></div>
                    </div>
                    <div class="last-name">
                        <label for="new-admin-last-name">Last Name:</label>
                        <input type="text" id="new-admin-last-name" name="admin-last-name" onblur="validateField('new-admin-last-name', 'Please Specify The New Admin\'s Last Name', null, 'new-admin-first-name', 'new-admin-last-name', 'new-admin-email', 'new-admin-email', 'new-admin-email', 'new-admin-password', 'new-admin-password', 'new-admin-password')">
                        <div class="error"></div>
                    </div>

                    <div class="phone-number">
                        <label for="new-admin-phone">Phone Number:</label>
                        <input type="number" id="new-admin-phone" name="admin-phone-number" onblur="validatePhoneNumber('submit', 'new-admin-phone', 'Please Enter A Phone Number That Will Be Associated With The New Admin\'s Account')">
                        <div class="error"></div>
                    </div>
                    
                    <div class="email">
                        <label for="new-admin-email">Email Address:</label>
                        <input type="text" id="new-admin-email" name="admin-modified-email" onblur="validateField('new-admin-email', 'Please Specify An Email that will be Associated With The New Admin\'s Rentals', null, 'new-admin-first-name', 'new-admin-last-name', 'new-admin-email', 'new-admin-email', 'new-admin-email', 'new-admin-password', 'new-admin-password', 'new-admin-password')">
                        <div class="error"></div>
                    </div>

                    <div class="password">
                        <label for="new-admin-password">Password:</label>
                        <input type="password" id="new-admin-password" name="admin-password" onblur="validateField('new-admin-password', 'Please Enter A Password To Secure The New Admin\'s Account', null, 'new-admin-first-name', 'new-admin-last-name', 'new-admin-email', 'new-admin-email', 'new-admin-email', 'new-admin-password', 'new-admin-password', 'new-admin-password')" placeholder="Un-encrypted Password">
                        <div class="error"></div>
                    </div>

                    <div class="show-pass">
                        <input type="checkbox" id="new-admin-show-pass" tabindex="0" onclick="toggleShowPassword('new-admin-show-pass', 'new-admin-password')">
                        <label for="new-admin-show-pass">Show Password</label>
                    </div>
                    
                    <input type="hidden" name="retrieved-email" value="<?php echo $email;?>">
                    <input type="hidden" name="retrieved-phone-number" value="<?php echo $adminPhone_Number;?>">
                    <input type="hidden" name="retrieved-password" value="<?php echo $password;?>">
                    <input type="hidden" name="passwordField" value="<?php echo $password;?>">
                    
                    <?php if(isset($administrators)){echo '<input type="hidden" name="administrators" value="' . htmlspecialchars(json_encode($administrators)) .'">';}?>
                    <?php if(isset($property_owners)){echo '<input type="hidden" name="property-owners" value="' .htmlspecialchars(json_encode($property_owners)) .'">';}?>
                    <?php if(isset($hostels)){echo '<input type="hidden" name="hostels" value="' .htmlspecialchars(json_encode($hostels)) .'">';}?>
                    <?php if(isset($singlerooms)){echo '<input type="hidden" name="single-rooms" value="' .htmlspecialchars(json_encode($singlerooms)) .'">';}?>
                    <?php if(isset($bedsitters)){echo '<input type="hidden" name="bedsitters" value="' .htmlspecialchars(json_encode($bedsitters)) .'">';}?>
                    <?php if(isset($apartments)){echo '<input type="hidden" name="apartments" value="' .htmlspecialchars(json_encode($apartments)) .'">';}?>
                    <?php if(isset($houses)){echo '<input type="hidden" name="houses" value="' .htmlspecialchars(json_encode($houses)) .'">';}?>
                    <?php if(isset($businesspremises)){echo '<input type="hidden" name="business-premises" value="' .htmlspecialchars(json_encode($businesspremises)) .'">';}?>
                    <?php if(isset($suites)){echo '<input type="hidden" name="suites" value="' .htmlspecialchars(json_encode($suites)) .'">';}?>

                    <input type="hidden" name="retrieved-admin-first-name" value="<?php echo $adminFirst_Name;?>">
                    <input type="hidden" name="retrieved-admin-last-name" value="<?php echo $adminLast_Name;?>">

                    <div class="add-new-admin-confirm-button">
                        <button type="submit" tabindex="0" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Confirm Details</button>
                    </div>                       
                </form> 
            </div>
        </div>
        <div class="contact-information">
            <div class="delete-admin-account-div">
                <form id="delete-admin-account" action="../Php/delete-admin.php" method="post" onsubmit="confirmAdminDelete(event)">
                    <input type="hidden" name="admin-phone-number" value="<?php echo $adminPhone_Number;?>">
                    <input type="hidden" name="admin-modified-email" value="<?php echo $email;?>">

                    <button type="submit">Delete Account</button>
                </form>
            </div>
            <div class="contact-information-form-div">
                <form id="contact-information-form" action="../Php/edit-admins-details.php" method="post" enctype="multipart/form-data" onsubmit="validateForm(event, 'contact-information-form', '#contact-information-form')">
                
                    <div class="first-name">
                        <label for="first-name">First Name:</label>
                        <input type="text" id="first-name" name="admin-first-name" value="<?php echo $adminFirst_Name;?>"  onblur="validateField('first-name', 'Please Specify Your First Name', null, 'first-name', 'last-name', 'email', 'email', 'email', 'password', 'password', 'password')" disabled>
                        <div class="error"></div>
                    </div>
                    <div class="last-name">
                        <label for="last-name">Last Name:</label>
                        <input type="text" id="last-name" name="admin-last-name" value="<?php echo $adminLast_Name;?>"  onblur="validateField('last-name', 'Please Specify Your Last Name', null, 'first-name', 'last-name', 'email', 'email', 'email', 'password', 'password', 'password')" disabled>
                        <div class="error"></div>
                    </div>

                    <div class="phone-number">
                        <label for="phone">Phone Number:</label>
                        <input type="number" id="phone" name="admin-phone-number" value="<?php echo $adminPhone_Number;?>"  onblur="validatePhoneNumber(null, 'phone', 'Please Enter A Phone Number That Will Be Associated With Your Account')" disabled>
                        <div class="error"></div>
                    </div>
                    
                    <div class="email">
                        <label for="email">Email Address:</label>
                        <input type="text" id="email" name="admin-modified-email" value="<?php echo $email;?>"  onblur="validateField('email', 'Please Specify An Email that will be Associated With Your Rentals', null, 'first-name', 'last-name', 'email', 'email', 'email', 'password', 'password', 'password')" disabled>
                        <div class="error"></div>
                    </div>

                    <div class="password">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="admin-password" value="<?php echo $password;?>"  onblur="validateField('password', 'Please Enter A Password To Secure Your Account', null, 'first-name', 'last-name', 'email', 'email', 'email', 'password', 'password', 'password')" disabled>
                        <div class="error"></div>
                    </div>

                    <input type="hidden" name="retrieved-email" value="<?php echo $email;?>">
                    <input type="hidden" name="retrieved-phone-number" value="<?php echo $adminPhone_Number;?>">

                    <input type="checkbox" id="show-pass" tabindex="0" onclick="toggleShowPassword('show-pass', 'password')">
                    <label for="show-pass">Show Password</label>

                    <div class="edit-details">
                        <button type="button" tabindex="0" onclick="toggleEnabled()" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Edit Details</button>
                    </div>

                    <input type="hidden" name="passwordField" value="<?php echo $password;?>">
                    <input type="hidden" name="administrators" value="<?php echo htmlspecialchars(json_encode($administrators)); ?>">
                    <input type="hidden" name="property-owners" value="<?php echo htmlspecialchars(json_encode($property_owners)); ?>">
                    <input type="hidden" name="retrieved-admin-first-name" value="<?php echo $adminFirst_Name; ?>">
                    <input type="hidden" name="retrieved-admin-last-name" value="<?php echo $adminLast_Name; ?>">
                    
                    
                    <div class="confirm-button">
                        <button type="submit" tabindex="0" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Confirm Details</button>
                    </div>                       
                </form> 
            </div>
        </div>
    </div>
</body>
</html>