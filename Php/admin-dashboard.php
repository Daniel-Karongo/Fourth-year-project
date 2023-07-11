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
                                            <button class="property-owners-table-edit-details-button" onclick="editDetails(event)">
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
                                                <button type="submit" class="property-owners-table-submit-details-button">
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
                    <div class="print-property-owners-table">
                        <button>Print Table</button>
                    </div>
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
                            <input type="hidden" name="email" value="' . $email . '">
                            <input type="hidden" name="passwordField" value="' . $password . '">
                            <input type="hidden" name="admin-first-name" value="' . $adminFirst_Name . '">
                            <input type="hidden" name="admin-last-name" value="' . $adminLast_Name . '">
                            <button type="submit">Hash Password</button>
                        </div>
                    </form>';

            } else {
                echo "<h3>No One Has Registered As A Property Owner</h3>";
            }
        ?>

        </div>
        <div class="rentals">
            
        </div>
        <div class="queries">
            
        </div>
        <div class="administrators">
            
        </div>
    </div>
</body>
</html>