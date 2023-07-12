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
            <button id="my-contact-information-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#my-contact-information-button', '.contact-information', '.property-owners-container, .rentals, .administrators, .queries', 'flex', 'row')">My Contact Information</button>

            <button id="property-owners-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#property-owners-button', '.property-owners-container', '.contact-information, .rentals, .administrators, .queries', 'flex', null)">Property Owners</button>

            <button id="rentals-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#rentals-button', '.rentals', '.contact-information, .property-owners-container, .administrators, .queries', 'flex', null)">Rentals</button>

            <button id="administrators-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#administrators-button', '.administrators', '.contact-information, .property-owners-container, .rentals, .queries', 'flex', null)">Administrators</button>

            <button id="queries-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#queries-button', '.queries', '.contact-information, .property-owners-container, .rentals, .administrators', 'flex', null)">Queries</button>
        </div>
        <div class="property-owners-container">
            <?php
                if (gettype($property_owners) !== "NULL") {
                    echo '
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
                                                <input type="hidden" name="passwordField" value="' . $password . '">
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
                        </form>';

                    echo '
                        <form class="print-property-owners-table" action="../Php/table-pdf.php" method="post">
                            <input type="hidden" name="property-owners" value="' . htmlspecialchars(json_encode($property_owners)) . '">
                            <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Print Table</button>
                        </form>
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
                            <div class="hash-button">
                                <input type="hidden" name="property-owners" value="' . htmlspecialchars(json_encode($property_owners)) . '">
                                <input type="hidden" name="administrators" value="' . htmlspecialchars(json_encode($administrators)) . '">
                                <input type="hidden" name="email" value="' . $email . '">
                                <input type="hidden" name="passwordField" value="' . $password . '">
                                <input type="hidden" name="admin-first-name" value="' . $adminFirst_Name . '">
                                <input type="hidden" name="admin-last-name" value="' . $adminLast_Name . '">
                                <input type="hidden" name="admin-phone-number" value="' . $adminPhone_Number .'">
                                <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Hash Password</button>
                            </div>
                        </form>';

                } else {
                    echo "<h3>No One Has Registered As A Property Owner</h3>";
                }
            ?>
        </div>
        <div class="rentals">
            rental
        </div>
        <div class="queries">
            queries
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
                                                    <input type="hidden" name="passwordField" value="' . $password . '">
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
                                <div class="hash-button">
                                    <input type="hidden" name="administrators" value="' . htmlspecialchars(json_encode($administrators)) . '">
                                    <input type="hidden" name="property-owners" value="' . htmlspecialchars(json_encode($property_owners)) . '">
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
                    <input type="hidden" name="administrators" value="<?php echo htmlspecialchars(json_encode($administrators)); ?>">
                    <input type="hidden" name="property-owners" value="<?php echo htmlspecialchars(json_encode($property_owners)); ?>">
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