
<?php

//-----------------Car Submit--------------------------
if (isset($_POST['submitCar'])){
    $to='quotes@getinsure.co.uk';
    $subject='Car Insurance for '.$_POST['firstName'].' '.$_POST['surname'];
    $headers="From: Car Insurance From\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $message = '<html><body style= "font-size: 18px;">';
    $message .= '<h1>Car insurance form, submitted by <span style="color: #3380ff">'.$_POST['firstName'].' '.$_POST['surname'].'</span></h1>';
    $message .= '<p><b>Online or Phone : '.$_POST['online'].'</b></p>';
    $message .= '<p><b>How did you hear about us? :</b> '.$_POST['hearAboutUs'].'</p>';
    $message .= '<p><b>Friend or Family Name :</b> '.$_POST['referrer'].'</p>';
    $message .= '<p><b>Have you or any of the drivers ever had insurance declined, cancelled or special terms imposed? :</b> '.$_POST['declined'].'</p>';

    if ($_POST['declined'] == "Yes"){
        $message .= '<p><b>Insurer Name :</b> '.$_POST['insurar'].'</p>';
    }

    $message .= '<br><br><h2>Personal Information</h2>';
    $message .= '<p><b>Title :</b> '.$_POST['title'].'</p>';
    $message .= '<p><b>First Name :</b> '.$_POST['firstName'].'</p>';
    $message .= '<p><b>Surname :</b> '.$_POST['surname'].'</p>';
    $message .= '<p><b>Date of Birth :</b> '.(strtotime($_POST['dateofBirth'])? date("d-m-Y", strtotime($_POST['dateofBirth'])):"").'</p>';
    $message .= '<p><b>House Number / Name :</b> '.$_POST['houseNumber'].'</p>';
    $message .= '<p><b>First Line of Address :</b> '.$_POST['addressFirsLine'].'</p>';
    $message .= '<p><b>Postcode :</b> '.$_POST['postcode'].'</p>';
    $message .= '<p><b>Marital Status :</b> '.$_POST['maritalStatus'].'</p>';
    $message .= '<p><b>Employment Status :</b> '.$_POST['employmentStatus'].'</p>';
    $message .= '<p><b>Employment Occupation :</b> '.$_POST['occupation'].'</p>';
    $message .= '<p><b>Employment Business :</b> '.$_POST['business'].'</p>';
    $message .= '<p><b>Are you a home owner? :</b> '.$_POST['homeOwner'].'</p>';
    $message .= '<p><b>Do you have any children under the age of 16? :</b> '.$_POST['children'].'</p>';

    $message .= '<br><br><h2>Contact Information</h2>';
    $message .= '<p><b>Email :</b> '.$_POST['email'].'</p>';
    $message .= '<p><b>Phone Number :</b> '.$_POST['phone'].'</p>';
    $message .= '<p><b>Mobile Number :</b> '.$_POST['mobile'].'</p>';
    $message .= '<p><b>Please contact me via :</b> '.$_POST['viaContact'].'</p>';

    $message .= '<br><br><h2>Driving History</h2>';
    $message .= '<p><b>Licence Type :</b> '.$_POST['licenceType'].'</p>';
    $message .= '<p><b>Period Licence Held :</b> '.$_POST['licencePeriod'].'</p>';
    $message .= '<p><b>If held for 3 years or less, what date was licence obtained :</b> '.(strtotime($_POST['licenseDate'])? date("d-m-Y", strtotime($_POST['licenseDate'])):"").'</p>';
    $message .= '<p><b>Please enter your 16 character driving licence number :</b> '.$_POST['enterLicenceNumber'].'</p>';
    $message .= '<p><b>DVLA medical conditions or disability :</b> '.$_POST['DVLAmedical'].'</p>';
    $message .= '<p><b>Any additional driving qualification :</b> '.$_POST['driverQualifications'].'</p>';
    $message .= '<p><b>If one is selected, what date was qualification obtained :</b> '.(strtotime($_POST['qualificationDate'])? date("d-m-Y", strtotime($_POST['qualificationDate'])):"").'</p>';
    $message .= '<p><b>Were you born in the UK? :</b> '.$_POST['bornPlace'].'</p>';
    $message .= '<p><b>If no, when did you become resident of the UK? :</b> '.(strtotime($_POST['residentDate'])? date("d-m-Y", strtotime($_POST['residentDate'])):"").'</p>';
    $message .= '<p><b>Use of any other vehicle? :</b> '.$_POST['otherVehicles'].'</p>';
    $message .= '<p><b>Non motoring criminal convictions? :</b> '.$_POST['criminalConvictions'].'</p>';

    if  ($_POST['criminalConvictions'] == "Yes")
    {
        $message .= '<p><b>Describe the conviction :</b> '.$_POST['non_motor_conviction'].'</p>';
    }

    $message .= '<p><b>Any motor accident (fault or non fault) or claims (whether claim made or not) in the last 5 years? :</b> '.$_POST['DVLA'].'</p>';
    $message .= '<p><b>Any motor convictions fixed penalties or disqualification in the last 5 years? :</b> '.$_POST['driverDetails'].'</p>';

    if ($_POST['DVLA'] == "Yes"){
        $message .= '<br><p><h3>Motor Accident 1</h3></p>';
        $message .= '<p><b>Type :</b> '.$_POST['convictionType1'].'</p>';
        $message .= '<p><b>Date :</b> '.(strtotime($_POST['date1'])? date("d-m-Y", strtotime($_POST['date1'])):"").'</p>';
        $message .= '<p><b>Damage :</b> '.$_POST['damage1'].'</p>';
        $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['cost1'].'</p>';
        $message .= '<p><b>Fault :</b> '.$_POST['fault1'].'</p>';
        $message .= '<p><b>Any Injuries? :</b> '.$_POST['injuries1'].'</p>';

        if ($_POST['convictionType2'] != "")
        {
            $message .= '<p><h3>Motor Accident 2</h3></p>';
            $message .= '<p><b>Type :</b> '.$_POST['convictionType2'].'</p>';
            $message .= '<p><b>Date :</b> '.(strtotime($_POST['date2'])? date("d-m-Y", strtotime($_POST['date2'])):"").'</p>';
            $message .= '<p><b>Damage :</b> '.$_POST['damage2'].'</p>';
            $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['cost2'].'</p>';
            $message .= '<p><b>Fault :</b> '.$_POST['fault2'].'</p>';
            $message .= '<p><b>Any Injuries? :</b> '.$_POST['injuries2'].'</p>';
        }

        if ($_POST['convictionType3'] != "")
        {
            $message .= '<p><h3>Motor Accident 3</h3></p>';
            $message .= '<p><b>Type :</b> '.$_POST['convictionType3'].'</p>';
            $message .= '<p><b>Date :</b> '.(strtotime($_POST['date3'])? date("d-m-Y", strtotime($_POST['date3'])):"").'</p>';
            $message .= '<p><b>Damage :</b> '.$_POST['damage3'].'</p>';
            $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['cost3'].'</p>';
            $message .= '<p><b>Fault :</b> '.$_POST['fault3'].'</p>';
            $message .= '<p><b>Any Injuries? :</b> '.$_POST['injuries3'].'</p>';
        }

        if ($_POST['convictionType4'] != "")
        {
            $message .= '<p><h3>Motor Accident 4</h3></p>';
            $message .= '<p><b>Type :</b> '.$_POST['convictionType4'].'</p>';
            $message .= '<p><b>Date :</b> '.(strtotime($_POST['date4'])? date("d-m-Y", strtotime($_POST['date4'])):"").'</p>';
            $message .= '<p><b>Damage :</b> '.$_POST['damage4'].'</p>';
            $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['cost4'].'</p>';
            $message .= '<p><b>Fault :</b> '.$_POST['fault4'].'</p>';
            $message .= '<p><b>Any Injuries? :</b> '.$_POST['injuries4'].'</p>';
        }
    }
    else{
        $message .= '<br><p><b>Motor Accident 1</b></p>';
        $message .= '<p><b>Motor Accident 2</b></p>';
        $message .= '<p><b>Motor Accident 3</b></p>';
        $message .= '<p><b>Motor Accident 4</b></p>';
    }

    if  ($_POST['driverDetails'] == "Yes"){
        $message .= '<br><p><h3>Motor Conviction 1</h3></p>';
        $message .= '<p><b>Conviction Code :</b> '.$_POST['convictionCode1'].'</p>';
        $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['convictionDate1'])? date("d-m-Y", strtotime($_POST['convictionDate1'])):"").'</p>';
        $message .= '<p><b>Points :</b> '.$_POST['points1'].'</p>';
        $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fine1'].'</p>';
        $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['ban1'].'</p>';

        if ($_POST['convictionCode2'] != "")
        {
            $message .= '<p><h3>Motor Conviction 2</h3></p>';
            $message .= '<p><b>Conviction Code :</b> '.$_POST['convictionCode2'].'</p>';
            $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['convictionDate2'])? date("d-m-Y", strtotime($_POST['convictionDate2'])):"").'</p>';
            $message .= '<p><b>Points :</b> '.$_POST['points2'].'</p>';
            $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fine2'].'</p>';
            $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['ban2'].'</p>';
        }

        if ($_POST['convictionCode3'] != "")
        {
            $message .= '<p><h3>Motor Conviction 3</h3></p>';
            $message .= '<p><b>Conviction Code :</b> '.$_POST['convictionCode3'].'</p>';
            $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['convictionDate3'])? date("d-m-Y", strtotime($_POST['convictionDate3'])):"").'</p>';
            $message .= '<p><b>Points :</b> '.$_POST['points3'].'</p>';
            $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fine3'].'</p>';
            $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['ban3'].'</p>';
        }

        if ($_POST['convictionCode4'] != "")
        {
            $message .= '<p><h3>Motor Conviction 4</h3></p>';
            $message .= '<p><b>Conviction Code :</b> '.$_POST['convictionCode4'].'</p>';
            $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['convictionDate4'])? date("d-m-Y", strtotime($_POST['convictionDate4'])):"").'</p>';
            $message .= '<p><b>Points :</b> '.$_POST['points4'].'</p>';
            $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fine4'].'</p>';
            $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['ban4'].'</p>';
        }
    }
    else{
        $message .= '<br><p><b>Motor Conviction 1</b></p>';
        $message .= '<p><b>Motor Conviction 2</b></p>';
        $message .= '<p><b>Motor Conviction 3</b></p>';
        $message .= '<p><b>Motor Conviction 4</b></p>';
    }

    $message .= '<br><br><h2>Vehicle Details</h2>';
    $message .= '<p><b>Vehicle Registration :</b> '.$_POST['vehicleReg'].'</p>';
    $message .= '<p><b>Approximate value of car at the present (&pound;) :</b> '.$_POST['carValue'].'</p>';
    $message .= '<p><b>Does the vehicle have any modifications? :</b> '.$_POST['modificationvehicle'].'</p>';

    if ($_POST['modificationvehicle'] == "Yes"){
        $message .= '<p><b>Modification Advise :</b> '.$_POST['modificationadvice'].'</p>';
    }

    $message .= '<br><br><h2>Vehicle Usage</h2>';
    $message .= '<p><b>Vehicle Purchase Date :</b> '.(strtotime($_POST['purchaseDate'])? date("d-m-Y", strtotime($_POST['purchaseDate'])):"").'</p>';
    $message .= '<p><b>What do you use the car for? :</b> '.$_POST['useOfVehicle'].'</p>';
    $message .= '<p><b>Where is the vehicle kept during the day? :</b> '.$_POST['duringDay'].'</p>';
    $message .= '<p><b>Where is the vehicle kept during night? :</b> '.$_POST['overnight'].'</p>';
    $message .= '<p><b>Is the vehicle kept at the same address? :</b> '.$_POST['sameAdd'].'</p>';
    $message .= '<p><b>If no, what is the full address where the vehicle is kept :</b> '.$_POST['fullAddr'].'</p>';
    $message .= '<p><b>Who is the Registered Keeper? :</b> '.$_POST['regKeeper'].'</p>';
    $message .= '<p><b>Who is the Registered Owner? :</b> '.$_POST['legalOwner'].'</p>';
    $message .= '<p><b>Estimated Annual Mileage :</b> '.$_POST['annualMileage'].'</p>';
    $message .= '<p><b>Type of Cover :</b> '.$_POST['CoverType'].'</p>';
    $message .= '<p><b>Any no claim discount :</b> '.$_POST['claimsDiscount'].'</p>';
    $message .= '<p><b>Was this NCD earned in the UK? :</b> '.$_POST['NCDearn'].'</p>';
    $message .= '<p><b>Would you like to protect your NCD? :</b> '.$_POST['protectNCD'].'</p>';
    $message .= '<p><b>What voluntary excess would you like? :</b> '.$_POST['excessVoluntary'].'</p>';
    $message .= '<p><b>How do you normally pay for insurance? :</b> '.$_POST['payInsurer'].'</p>';
    $message .= '<p><b>Current/Previous Insurer’s name :</b> '.$_POST['insurerName'].'</p>';
    $message .= '<p><b>When would you like your policy to start? :</b> '.(strtotime($_POST['policyStart'])? date("d-m-Y", strtotime($_POST['policyStart'])):"").'</p>';

    $message .= '<br><br><h2>Additional Drivers</h2>';
    $message .= '<p><b>Would you like to add an Additional Driver? :</b> '.$_POST['additonalDriver'].'</p>';

    if ($_POST['additonalDriver'] == "Yes"){
        $message .= '<br><p><h3>Additional Driver 1</h3></p>';
        $message .= '<p><b>Title :</b> '.$_POST['title1'].'</p>';
        $message .= '<p><b>First Name :</b> '.$_POST['firstName1'].'</p>';
        $message .= '<p><b>Surname :</b> '.$_POST['surname1'].'</p>';
        $message .= '<p><b>Relationship To Policy Holder :</b> '.$_POST['policyHolder'].'</p>';
        $message .= '<p><b>Date of Birth :</b> '.(strtotime($_POST['birthDate'])? date("d-m-Y", strtotime($_POST['birthDate'])):"").'</p>';
        $message .= '<p><b>Marital Status :</b> '.$_POST['maritalStatus1'].'</p>';
        $message .= '<p><b>Employment Status :</b> '.$_POST['employmentStatus1'].'</p>';
        $message .= '<p><b>If Employed/Self Employed, What is your occupation :</b> '.$_POST['occupation1'].'</p>';
        $message .= '<p><b>If employed/Self-employed, what is your business :</b> '.$_POST['business1'].'</p>';
        $message .= '<p><b>Type of license :</b> '.$_POST['licenseType'].'</p>';
        $message .= '<p><b>Period License held for :</b> '.$_POST['licensePeriod'].'</p>';
        $message .= '<p><b>If held for 4 years or less, what date was licence obtained? :</b> '.(strtotime($_POST['licenceObtain'])? date("d-m-Y", strtotime($_POST['licenceObtain'])):"").'</p>';

        if ($_POST['drivingLicence'] == "Yes"){
            $message .= '<p><b>Please enter your 16 character driving licence number :</b> '.$_POST['licenceNumber'].'</p>';
        }

        $message .= '<p><b>DVLA medical conditions or disabilities? :</b> '.$_POST['DVLAconditions'].'</p>';
        $message .= '<p><b>Were you born in the UK? :</b> '.$_POST['bornPlace1'].'</p>';
        $message .= '<p><b>If No, when did you last become a UK resident? :</b> '.(strtotime($_POST['Ukresident'])? date("d-m-Y", strtotime($_POST['Ukresident'])):"").'</p>';
        $message .= '<p><b>Use of any other vehicles? :</b> '.$_POST['otherVehicles1'].'</p>';
        $message .= '<p><b>Non motoring criminal convictions? :</b> '.$_POST['criminalConviction'].'</p>';

        if  ($_POST['criminalConviction'] == "Yes")
        {
            $message .= '<p><b>Describe the conviction :</b> '.$_POST['non_motor_conviction1'].'</p>';
        }

        $message .= '<p><b>Any motor accident (fault or non fault) or claims (whether claim made or not) in the last 5 years? :</b> '.$_POST['DVLA1'].'</p>';
        $message .= '<p><b>Any motor convictions fixed penalties or disqualification in the last 5 years? :</b> '.$_POST['driverDetails1'].'</p>';

        if ($_POST['DVLA1'] == "Yes"){
            $message .= '<br><p><h3>Motor Accident 1</h3></p>';
            $message .= '<p><b>Type :</b> '.$_POST['type1'].'</p>';
            $message .= '<p><b>Date :</b> '.(strtotime($_POST['accidentDate1'])? date("d-m-Y", strtotime($_POST['accidentDate1'])):"").'</p>';
            $message .= '<p><b>Damage :</b> '.$_POST['damageType1'].'</p>';
            $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['damageCost1'].'</p>';
            $message .= '<p><b>Fault :</b> '.$_POST['faultType1'].'</p>';
            $message .= '<p><b>Any Injuries? :</b> '.$_POST['injury1'].'</p>';

            if ($_POST['type2'] != "")
            {
                $message .= '<p><h3>Motor Accident 2</h3></p>';
                $message .= '<p><b>Type :</b> '.$_POST['type2'].'</p>';
                $message .= '<p><b>Date :</b> '.(strtotime($_POST['accidentDate2'])? date("d-m-Y", strtotime($_POST['accidentDate2'])):"").'</p>';
                $message .= '<p><b>Damage :</b> '.$_POST['damageType2'].'</p>';
                $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['damageCost2'].'</p>';
                $message .= '<p><b>Fault :</b> '.$_POST['faultType2'].'</p>';
                $message .= '<p><b>Any Injuries? :</b> '.$_POST['injury2'].'</p>';
            }

            if ($_POST['type3'] != "")
            {
                $message .= '<p><h3>Motor Accident 3</h3></p>';
                $message .= '<p><b>Type :</b> '.$_POST['type3'].'</p>';
                $message .= '<p><b>Date :</b> '.(strtotime($_POST['accidentDate3'])? date("d-m-Y", strtotime($_POST['accidentDate3'])):"").'</p>';
                $message .= '<p><b>Damage :</b> '.$_POST['damageType3'].'</p>';
                $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['damageCost3'].'</p>';
                $message .= '<p><b>Fault :</b> '.$_POST['faultType3'].'</p>';
                $message .= '<p><b>Any Injuries? :</b> '.$_POST['injury3'].'</p>';
            }

            if ($_POST['type4'] != "")
            {
                $message .= '<p><h3>Motor Accident 4</h3></p>';
                $message .= '<p><b>Type :</b> '.$_POST['type4'].'</p>';
                $message .= '<p><b>Date :</b> '.(strtotime($_POST['accidentDate4'])? date("d-m-Y", strtotime($_POST['accidentDate4'])):"").'</p>';
                $message .= '<p><b>Damage :</b> '.$_POST['damageType4'].'</p>';
                $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['damageCost4'].'</p>';
                $message .= '<p><b>Fault :</b> '.$_POST['faultType4'].'</p>';
                $message .= '<p><b>Any Injuries? :</b> '.$_POST['injury4'].'</p>';
            }
        }

        if  ($_POST['driverDetails1'] == "Yes"){
            $message .= '<br><p><h3>Motor Conviction 1</h3></p>';
            $message .= '<p><b>Conviction Code :</b> '.$_POST['conviction1'].'</p>';
            $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['dateConviction1'])? date("d-m-Y", strtotime($_POST['dateConviction1'])):"").'</p>';
            $message .= '<p><b>Points :</b> '.$_POST['pointConviction1'].'</p>';
            $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fineConviction1'].'</p>';
            $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['banConviction1'].'</p>';

            if ($_POST['conviction2'] != "")
            {
                $message .= '<p><h3>Motor Conviction 2</h3></p>';
                $message .= '<p><b>Conviction Code :</b> '.$_POST['conviction2'].'</p>';
                $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['dateConviction2'])? date("d-m-Y", strtotime($_POST['dateConviction2'])):"").'</p>';
                $message .= '<p><b>Points :</b> '.$_POST['pointConviction2'].'</p>';
                $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fineConviction2'].'</p>';
                $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['banConviction2'].'</p>';
            }

            if ($_POST['conviction3'] != "")
            {
                $message .= '<p><h3>Motor Conviction 3</h3></p>';
                $message .= '<p><b>Conviction Code :</b> '.$_POST['conviction3'].'</p>';
                $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['dateConviction3'])? date("d-m-Y", strtotime($_POST['dateConviction3'])):"").'</p>';
                $message .= '<p><b>Points :</b> '.$_POST['pointConviction3'].'</p>';
                $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fineConviction3'].'</p>';
                $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['banConviction3'].'</p>';
            }

            if ($_POST['conviction4'] != "")
            {
                $message .= '<p><h3>Motor Conviction 4</h3></p>';
                $message .= '<p><b>Conviction Code :</b> '.$_POST['conviction4'].'</p>';
                $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['dateConviction4'])? date("d-m-Y", strtotime($_POST['dateConviction4'])):"").'</p>';
                $message .= '<p><b>Points :</b> '.$_POST['pointConviction4'].'</p>';
                $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fineConviction4'].'</p>';
                $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['banConviction4'].'</p>';
            }
        }

        $message .= '<br><p><b>Would you like to add another Additional Driver? :</b> '.$_POST['additonalDriver2'].'</p>';

        if ($_POST['additonalDriver2'] == "Yes"){
            $message .= '<p><h3>Additional Driver 2</h3></p>';
            $message .= '<p><b>Title :</b> '.$_POST['title2'].'</p>';
            $message .= '<p><b>First Name :</b> '.$_POST['firstName2'].'</p>';
            $message .= '<p><b>Surname :</b> '.$_POST['surname2'].'</p>';
            $message .= '<p><b>Relationship To Policy Holder :</b> '.$_POST['policyHolder2'].'</p>';
            $message .= '<p><b>Date of Birth :</b> '.(strtotime($_POST['birthDate2'])? date("d-m-Y", strtotime($_POST['birthDate2'])):"").'</p>';
            $message .= '<p><b>Marital Status :</b> '.$_POST['maritalStatus2'].'</p>';
            $message .= '<p><b>Employment Status :</b> '.$_POST['employmentStatus2'].'</p>';
            $message .= '<p><b>If Employed/Self Employed, What is your occupation :</b> '.$_POST['occupation2'].'</p>';
            $message .= '<p><b>If employed/Self-employed, what is your business :</b> '.$_POST['business2'].'</p>';
            $message .= '<p><b>Type of license :</b> '.$_POST['licenseType2'].'</p>';
            $message .= '<p><b>Period License held for :</b> '.$_POST['licensePeriod2'].'</p>';
            $message .= '<p><b>If held for 4 years or less, what date was licence obtained? :</b> '.(strtotime($_POST['licenceObtain2'])? date("d-m-Y", strtotime($_POST['licenceObtain2'])):"").'</p>';

            if ($_POST['drivingLicence2'] == "Yes"){
                $message .= '<p><b>Please enter your 16 character driving licence number :</b> '.$_POST['licenceNumber2'].'</p>';
            }

            $message .= '<p><b>DVLA medical conditions or disabilities? :</b> '.$_POST['DVLAconditions2'].'</p>';
            $message .= '<p><b>Were you born in the UK? :</b> '.$_POST['bornPlace2'].'</p>';
            $message .= '<p><b>If No, when did you last become a UK resident? :</b> '.(strtotime($_POST['Ukresident2'])? date("d-m-Y", strtotime($_POST['Ukresident2'])):"").'</p>';
            $message .= '<p><b>Use of any other vehicles? :</b> '.$_POST['otherVehicles2'].'</p>';
            $message .= '<p><b>Non motoring criminal convictions? :</b> '.$_POST['criminalConviction2'].'</p>';

            if  ($_POST['criminalConviction2'] == "Yes")
            {
                $message .= '<p><b>Describe the conviction :</b> '.$_POST['non_motor_conviction2'].'</p>';
            }

            $message .= '<p><b>Any motor accident (fault or non fault) or claims (whether claim made or not) in the last 5 years? :</b> '.$_POST['DVLA2'].'</p>';
            $message .= '<p><b>Any motor convictions fixed penalties or disqualification in the last 5 years? :</b> '.$_POST['driverDetails2'].'</p>';

            if ($_POST['DVLA2'] == "Yes"){
                $message .= '<br><p><h3>Motor Accident 1</h3></p>';
                $message .= '<p><b>Type :</b> '.$_POST['type5'].'</p>';
                $message .= '<p><b>Date :</b> '.(strtotime($_POST['accidentDate5'])? date("d-m-Y", strtotime($_POST['accidentDate5'])):"").'</p>';
                $message .= '<p><b>Damage :</b> '.$_POST['damageType5'].'</p>';
                $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['damageCost5'].'</p>';
                $message .= '<p><b>Fault :</b> '.$_POST['faultType5'].'</p>';
                $message .= '<p><b>Any Injuries? :</b> '.$_POST['injury5'].'</p>';

                if ($_POST['type6'] != "")
                {
                    $message .= '<p><h3>Motor Accident 2</h3></p>';
                    $message .= '<p><b>Type :</b> '.$_POST['type6'].'</p>';
                    $message .= '<p><b>Date :</b> '.(strtotime($_POST['accidentDate6'])? date("d-m-Y", strtotime($_POST['accidentDate6'])):"").'</p>';
                    $message .= '<p><b>Damage :</b> '.$_POST['damageType6'].'</p>';
                    $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['damageCost6'].'</p>';
                    $message .= '<p><b>Fault :</b> '.$_POST['faultType6'].'</p>';
                    $message .= '<p><b>Any Injuries? :</b> '.$_POST['injury6'].'</p>';
                }

                if ($_POST['type7'] != "")
                {
                    $message .= '<p><h3>Motor Accident 3</h3></p>';
                    $message .= '<p><b>Type :</b> '.$_POST['type7'].'</p>';
                    $message .= '<p><b>Date :</b> '.(strtotime($_POST['accidentDate7'])? date("d-m-Y", strtotime($_POST['accidentDate7'])):"").'</p>';
                    $message .= '<p><b>Damage :</b> '.$_POST['damageType7'].'</p>';
                    $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['damageCost7'].'</p>';
                    $message .= '<p><b>Fault :</b> '.$_POST['faultType7'].'</p>';
                    $message .= '<p><b>Any Injuries? :</b> '.$_POST['injury7'].'</p>';
                }

                if ($_POST['type8'] != "")
                {
                    $message .= '<p><h3>Motor Accident 4</h3></p>';
                    $message .= '<p><b>Type :</b> '.$_POST['type8'].'</p>';
                    $message .= '<p><b>Date :</b> '.(strtotime($_POST['accidentDate8'])? date("d-m-Y", strtotime($_POST['accidentDate8'])):"").'</p>';
                    $message .= '<p><b>Damage :</b> '.$_POST['damageType8'].'</p>';
                    $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['damageCost8'].'</p>';
                    $message .= '<p><b>Fault :</b> '.$_POST['faultType8'].'</p>';
                    $message .= '<p><b>Any Injuries? :</b> '.$_POST['injury8'].'</p>';
                }
            }

            if  ($_POST['driverDetails2'] == "Yes"){
                $message .= '<br><p><h3>Motor Conviction 1</h3></p>';
                $message .= '<p><b>Conviction Code :</b> '.$_POST['conviction5'].'</p>';
                $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['dateConviction5'])? date("d-m-Y", strtotime($_POST['dateConviction5'])):"").'</p>';
                $message .= '<p><b>Points :</b> '.$_POST['pointConviction5'].'</p>';
                $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fineConviction5'].'</p>';
                $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['banConviction5'].'</p>';

                if ($_POST['conviction6'] != "")
                {
                    $message .= '<p><h3>Motor Conviction 2</h3></p>';
                    $message .= '<p><b>Conviction Code :</b> '.$_POST['conviction6'].'</p>';
                    $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['dateConviction6'])? date("d-m-Y", strtotime($_POST['dateConviction6'])):"").'</p>';
                    $message .= '<p><b>Points :</b> '.$_POST['pointConviction6'].'</p>';
                    $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fineConviction6'].'</p>';
                    $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['banConviction6'].'</p>';
                }

                if ($_POST['conviction7'] != "")
                {
                    $message .= '<p><h3>Motor Conviction 3</h3></p>';
                    $message .= '<p><b>Conviction Code :</b> '.$_POST['conviction7'].'</p>';
                    $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['dateConviction7'])? date("d-m-Y", strtotime($_POST['dateConviction7'])):"").'</p>';
                    $message .= '<p><b>Points :</b> '.$_POST['pointConviction7'].'</p>';
                    $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fineConviction7'].'</p>';
                    $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['banConviction7'].'</p>';
                }

                if ($_POST['conviction8'] != "")
                {
                    $message .= '<p><h3>Motor Conviction 4</h3></p>';
                    $message .= '<p><b>Conviction Code :</b> '.$_POST['conviction8'].'</p>';
                    $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['dateConviction8'])? date("d-m-Y", strtotime($_POST['dateConviction8'])):"").'</p>';
                    $message .= '<p><b>Points :</b> '.$_POST['pointConviction8'].'</p>';
                    $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fineConviction8'].'</p>';
                    $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['banConviction8'].'</p>';
                }
            }
        }
    }

    $message .= '<br><h3>Additional Comments</h3>';
    $message .= '<p><small>'.$_POST['addComment'].'</small></p>';
    $message .= '<br><p><b>Terms & Privacy Policy :</b> '.$_POST['agreement'].'</p>';
    $message .= '</body></html>';

    mail($to, $subject, $message, $headers);
}



//-----------------Van Submit--------------------------
if (isset($_POST['submitVan'])){
    $to='quotes@getinsure.co.uk';
    $subject='Van Insurance for '.$_POST['firstName'].' '.$_POST['surname'];
    $headers="From: Van Insurance Form\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $message = '<html><body style= "font-size: 18px;">';
    $message .= '<h1>Van insurance form, submitted by <span style="color: #3380ff">'.$_POST['firstName'].' '.$_POST['surname'].'</span></h1>';
    $message .= '<p><b>Online or Phone : '.$_POST['online'].'</b></p>';
    $message .= '<p><b>How did you hear about us? :</b> '.$_POST['hearAboutUs'].'</p>';
    $message .= '<p><b>Friend or Family Name :</b> '.$_POST['referrer'].'</p>';
    $message .= '<p><b>Have you or any of the drivers ever had insurance declined, cancelled or special terms imposed? :</b> '.$_POST['declined'].'</p>';

    if ($_POST['declined'] == "Yes"){
        $message .= '<p><b>Insurer Name :</b> '.$_POST['insurar'].'</p>';
    }

    $message .= '<br><br><h2>Personal Information</h2>';
    $message .= '<p><b>Title :</b> '.$_POST['title'].'</p>';
    $message .= '<p><b>First Name :</b> '.$_POST['firstName'].'</p>';
    $message .= '<p><b>Surname :</b> '.$_POST['surname'].'</p>';
    $message .= '<p><b>Date of Birth :</b> '.(strtotime($_POST['dateofBirth'])? date("d-m-Y", strtotime($_POST['dateofBirth'])):"").'</p>';
    $message .= '<p><b>House Number / Name :</b> '.$_POST['houseNumber'].'</p>';
    $message .= '<p><b>First Line of Address :</b> '.$_POST['addressFirsLine'].'</p>';
    $message .= '<p><b>Postcode :</b> '.$_POST['postcode'].'</p>';
    $message .= '<p><b>Marital Status :</b> '.$_POST['maritalStatus'].'</p>';
    $message .= '<p><b>Employment Status :</b> '.$_POST['employmentStatus'].'</p>';
    $message .= '<p><b>Employment Occupation :</b> '.$_POST['occupation'].'</p>';
    $message .= '<p><b>Employment Business :</b> '.$_POST['business'].'</p>';
    $message .= '<p><b>Are you a home owner? :</b> '.$_POST['homeOwner'].'</p>';
    $message .= '<p><b>Do you have any children under the age of 16? :</b> '.$_POST['children'].'</p>';
    $message .= '<br><br><h2>Contact Information</h2>';
    $message .= '<p><b>Email :</b> '.$_POST['email'].'</p>';
    $message .= '<p><b>Phone Number :</b> '.$_POST['phone'].'</p>';
    $message .= '<p><b>Mobile Number :</b> '.$_POST['mobile'].'</p>';
    $message .= '<p><b>Please contact me via :</b> '.$_POST['viaContact'].'</p>';

    $message .= '<br><br><h2>Driving History</h2>';
    $message .= '<p><b>Licence Type :</b> '.$_POST['licenceType'].'</p>';
    $message .= '<p><b>Period Licence Held :</b> '.$_POST['licencePeriod'].'</p>';
    $message .= '<p><b>If held for 3 years or less, what date was licence obtained :</b> '.(strtotime($_POST['licenseDate'])? date("d-m-Y", strtotime($_POST['licenseDate'])):"").'</p>';
    $message .= '<p><b>Please enter your 16 character driving licence number :</b> '.$_POST['enterLicenceNumber'].'</p>';
    $message .= '<p><b>DVLA medical conditions or disability :</b> '.$_POST['DVLAmedical'].'</p>';
    $message .= '<p><b>Any additional driving qualification :</b> '.$_POST['driverQualifications'].'</p>';
    $message .= '<p><b>If one is selected, what date was qualification obtained :</b> '.(strtotime($_POST['qualificationDate'])? date("d-m-Y", strtotime($_POST['qualificationDate'])):"").'</p>';
    $message .= '<p><b>Were you born in the UK? :</b> '.$_POST['bornPlace'].'</p>';
    $message .= '<p><b>If no, when did you become resident of the UK? :</b> '.(strtotime($_POST['residentDate'])? date("d-m-Y", strtotime($_POST['residentDate'])):"").'</p>';
    $message .= '<p><b>Use of any other vehicle? :</b> '.$_POST['otherVehicles'].'</p>';
    $message .= '<p><b>Non motoring criminal convictions? :</b> '.$_POST['criminalConvictions'].'</p>';

    if  ($_POST['criminalConvictions'] == "Yes")
    {
        $message .= '<p><b>Describe the conviction :</b> '.$_POST['non_motor_conviction'].'</p>';
    }

    $message .= '<p><b>Any motor accident (fault or non fault) or claims (whether claim made or not) in the last 5 years? :</b> '.$_POST['DVLA'].'</p>';
    $message .= '<p><b>Any motor convictions fixed penalties or disqualification in the last 5 years? :</b> '.$_POST['driverDetails'].'</p>';

    if ($_POST['DVLA'] == "Yes"){
        $message .= '<br><p><h3>Motor Accident 1</h3></p>';
        $message .= '<p><b>Type :</b> '.$_POST['convictionType1'].'</p>';
        $message .= '<p><b>Date :</b> '.(strtotime($_POST['date1'])? date("d-m-Y", strtotime($_POST['date1'])):"").'</p>';
        $message .= '<p><b>Damage :</b> '.$_POST['damage1'].'</p>';
        $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['cost1'].'</p>';
        $message .= '<p><b>Fault :</b> '.$_POST['fault1'].'</p>';
        $message .= '<p><b>Any Injuries? :</b> '.$_POST['injuries1'].'</p>';

        if ($_POST['convictionType2'] != "")
        {
            $message .= '<p><h3>Motor Accident 2</h3></p>';
            $message .= '<p><b>Type :</b> '.$_POST['convictionType2'].'</p>';
            $message .= '<p><b>Date :</b> '.(strtotime($_POST['date2'])? date("d-m-Y", strtotime($_POST['date2'])):"").'</p>';
            $message .= '<p><b>Damage :</b> '.$_POST['damage2'].'</p>';
            $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['cost2'].'</p>';
            $message .= '<p><b>Fault :</b> '.$_POST['fault2'].'</p>';
            $message .= '<p><b>Any Injuries? :</b> '.$_POST['injuries2'].'</p>';
        }

        if ($_POST['convictionType3'] != "")
        {
            $message .= '<p><h3>Motor Accident 3</h3></p>';
            $message .= '<p><b>Type :</b> '.$_POST['convictionType3'].'</p>';
            $message .= '<p><b>Date :</b> '.(strtotime($_POST['date3'])? date("d-m-Y", strtotime($_POST['date3'])):"").'</p>';
            $message .= '<p><b>Damage :</b> '.$_POST['damage3'].'</p>';
            $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['cost3'].'</p>';
            $message .= '<p><b>Fault :</b> '.$_POST['fault3'].'</p>';
            $message .= '<p><b>Any Injuries? :</b> '.$_POST['injuries3'].'</p>';
        }

        if ($_POST['convictionType4'] != "")
        {
            $message .= '<p><h3>Motor Accident 4</h3></p>';
            $message .= '<p><b>Type :</b> '.$_POST['convictionType4'].'</p>';
            $message .= '<p><b>Date :</b> '.(strtotime($_POST['date4'])? date("d-m-Y", strtotime($_POST['date4'])):"").'</p>';
            $message .= '<p><b>Damage :</b> '.$_POST['damage4'].'</p>';
            $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['cost4'].'</p>';
            $message .= '<p><b>Fault :</b> '.$_POST['fault4'].'</p>';
            $message .= '<p><b>Any Injuries? :</b> '.$_POST['injuries4'].'</p>';
        }
    }
    else{
        $message .= '<br><p><b>Motor Accident 1</b></p>';
        $message .= '<p><b>Motor Accident 2</b></p>';
        $message .= '<p><b>Motor Accident 3</b></p>';
        $message .= '<p><b>Motor Accident 4</b></p>';
    }

    if  ($_POST['driverDetails'] == "Yes"){
        $message .= '<br><p><h3>Motor Conviction 1</h3></p>';
        $message .= '<p><b>Conviction Code :</b> '.$_POST['convictionCode1'].'</p>';
        $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['convictionDate1'])? date("d-m-Y", strtotime($_POST['convictionDate1'])):"").'</p>';
        $message .= '<p><b>Points :</b> '.$_POST['points1'].'</p>';
        $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fine1'].'</p>';
        $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['ban1'].'</p>';

        if ($_POST['convictionCode2'] != "")
        {
            $message .= '<p><h3>Motor Conviction 2</h3></p>';
            $message .= '<p><b>Conviction Code :</b> '.$_POST['convictionCode2'].'</p>';
            $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['convictionDate2'])? date("d-m-Y", strtotime($_POST['convictionDate2'])):"").'</p>';
            $message .= '<p><b>Points :</b> '.$_POST['points2'].'</p>';
            $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fine2'].'</p>';
            $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['ban2'].'</p>';
        }

        if ($_POST['convictionCode3'] != "")
        {
            $message .= '<p><h3>Motor Conviction 3</h3></p>';
            $message .= '<p><b>Conviction Code :</b> '.$_POST['convictionCode3'].'</p>';
            $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['convictionDate3'])? date("d-m-Y", strtotime($_POST['convictionDate3'])):"").'</p>';
            $message .= '<p><b>Points :</b> '.$_POST['points3'].'</p>';
            $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fine3'].'</p>';
            $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['ban3'].'</p>';
        }

        if ($_POST['convictionCode4'] != "")
        {
            $message .= '<p><h3>Motor Conviction 4</h3></p>';
            $message .= '<p><b>Conviction Code :</b> '.$_POST['convictionCode4'].'</p>';
            $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['convictionDate4'])? date("d-m-Y", strtotime($_POST['convictionDate4'])):"").'</p>';
            $message .= '<p><b>Points :</b> '.$_POST['points4'].'</p>';
            $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fine4'].'</p>';
            $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['ban4'].'</p>';
        }
    }
    else{
        $message .= '<br><p><b>Motor Conviction 1</b></p>';
        $message .= '<p><b>Motor Conviction 2</b></p>';
        $message .= '<p><b>Motor Conviction 3</b></p>';
        $message .= '<p><b>Motor Conviction 4</b></p>';
    }

    $message .= '<br><br><h2>Vehicle Details</h2>';
    $message .= '<p><b>Vehicle Registration :</b> '.$_POST['vehicleReg'].'</p>';
    $message .= '<p><b>Approximate value of van at the present (&pound;) :</b> '.$_POST['vanValue'].'</p>';
    $message .= '<p><b>Does the vehicle have any modifications? :</b> '.$_POST['modificationvehicle'].'</p>';

    if ($_POST['modificationvehicle'] == "Yes"){
        $message .= '<p><b>Modification Advise :</b> '.$_POST['modificationadvice'].'</p>';
    }

    $message .= '<p><b>Manufacturer :</b> '.$_POST['manufacturer'].'</p>';
    $message .= '<p><b>Van Model :</b> '.$_POST['model'].'</p>';
    $message .= '<p><b>Van Registration Year :</b> '.$_POST['regYear'].'</p>';
    $message .= '<p><b>Alarm - Immobilizer :</b> '.$_POST['alarms'].'</p>';
    $message .= '<p><b>Number Of Seats :</b> '.$_POST['seatNumber'].'</p>';
    $message .= '<p><b>Number Of Doors :</b> '.$_POST['doorNumber'].'</p>';
    $message .= '<p><b>Engine Size (CC) :</b> '.$_POST['engineSize'].'</p>';
    $message .= '<p><b>Transmission :</b> '.$_POST['transmission'].'</p>';
    $message .= '<p><b>Fuel Type  :</b> '.$_POST['fuelType'].'</p>';
    $message .= '<p><b>Body Type :</b> '.$_POST['bodyType'].'</p>';
    $message .= '<p><b>Roof Type :</b> '.$_POST['roofType'].'</p>';
    $message .= '<p><b>Wheel Base :</b> '.$_POST['wheelBase'].'</p>';
    $message .= '<p><b>Is the Vehicle Impounded with the Police? :</b> '.$_POST['impoundedPolice'].'</p>';

    $message .= '<br><br><h2>Vehicle Usage</h2>';
    $message .= '<p><b>Vehicle Purchase Date :</b> '.(strtotime($_POST['purchaseDate'])? date("d-m-Y", strtotime($_POST['purchaseDate'])):"").'</p>';
    $message .= '<p><b>What do you use the van for? :</b> '.$_POST['useOfVehicle'].'</p>';
    $message .= '<p><b>Where is the vehicle kept during the day? :</b> '.$_POST['duringDay'].'</p>';
    $message .= '<p><b>Where is the vehicle kept during night? :</b> '.$_POST['overnight'].'</p>';
    $message .= '<p><b>Is the vehicle kept at the same address? :</b> '.$_POST['sameAdd'].'</p>';
    $message .= '<p><b>If no, what is the full address where the vehicle is kept :</b> '.$_POST['fullAddr'].'</p>';
    $message .= '<p><b>Who is the Registered Keeper? :</b> '.$_POST['regKeeper'].'</p>';
    $message .= '<p><b>Who is the Registered Owner? :</b> '.$_POST['legalOwner'].'</p>';
    $message .= '<p><b>Estimated Annual Mileage :</b> '.$_POST['annualMileage'].'</p>';
    $message .= '<p><b>Type of Cover :</b> '.$_POST['CoverType'].'</p>';
    $message .= '<p><b>Any no claim discount :</b> '.$_POST['claimsDiscount'].'</p>';
    $message .= '<p><b>Was this NCD earned in the UK? :</b> '.$_POST['NCDearn'].'</p>';
    $message .= '<p><b>Would you like to protect your NCD? :</b> '.$_POST['protectNCD'].'</p>';
    $message .= '<p><b>What voluntary excess would you like? :</b> '.$_POST['excessVoluntary'].'</p>';
    $message .= '<p><b>How do you normally pay for insurance? :</b> '.$_POST['payInsurer'].'</p>';
    $message .= '<p><b>Current/Previous Insurer’s name :</b> '.$_POST['insurerName'].'</p>';
    $message .= '<p><b>When would you like your policy to start? :</b> '.(strtotime($_POST['policyStart'])? date("d-m-Y", strtotime($_POST['policyStart'])):"").'</p>';

    $message .= '<br><br><h2>Additional Drivers</h2>';
    $message .= '<p><b>Would you like to add an Additional Driver? :</b> '.$_POST['additonalDriver'].'</p>';

    if ($_POST['additonalDriver'] == "Yes"){
        $message .= '<br><p><h3>Additional Driver 1</h3></p>';
        $message .= '<p><b>Title :</b> '.$_POST['title1'].'</p>';
        $message .= '<p><b>First Name :</b> '.$_POST['firstName1'].'</p>';
        $message .= '<p><b>Surname :</b> '.$_POST['surname1'].'</p>';
        $message .= '<p><b>Relationship To Policy Holder :</b> '.$_POST['policyHolder'].'</p>';
        $message .= '<p><b>Date of Birth :</b> '.(strtotime($_POST['birthDate'])? date("d-m-Y", strtotime($_POST['birthDate'])):"").'</p>';
        $message .= '<p><b>Marital Status :</b> '.$_POST['maritalStatus1'].'</p>';
        $message .= '<p><b>Employment Status :</b> '.$_POST['employmentStatus1'].'</p>';
        $message .= '<p><b>If Employed/Self Employed, What is your occupation :</b> '.$_POST['occupation1'].'</p>';
        $message .= '<p><b>If employed/Self-employed, what is your business :</b> '.$_POST['business1'].'</p>';
        $message .= '<p><b>Type of license :</b> '.$_POST['licenseType'].'</p>';
        $message .= '<p><b>Period License held for :</b> '.$_POST['licensePeriod'].'</p>';
        $message .= '<p><b>If held for 4 years or less, what date was licence obtained? :</b> '.(strtotime($_POST['licenceObtain'])? date("d-m-Y", strtotime($_POST['licenceObtain'])):"").'</p>';

        if ($_POST['drivingLicence'] == "Yes"){
            $message .= '<p><b>Please enter your 16 character driving licence number :</b> '.$_POST['licenceNumber'].'</p>';
        }

        $message .= '<p><b>DVLA medical conditions or disabilities? :</b> '.$_POST['DVLAconditions'].'</p>';
        $message .= '<p><b>Were you born in the UK? :</b> '.$_POST['bornPlace1'].'</p>';
        $message .= '<p><b>If No, when did you last become a UK resident? :</b> '.(strtotime($_POST['Ukresident'])? date("d-m-Y", strtotime($_POST['Ukresident'])):"").'</p>';
        $message .= '<p><b>Use of any other vehicles? :</b> '.$_POST['otherVehicles1'].'</p>';
        $message .= '<p><b>Non motoring criminal convictions? :</b> '.$_POST['criminalConviction'].'</p>';

        if  ($_POST['criminalConviction'] == "Yes")
        {
            $message .= '<p><b>Describe the conviction :</b> '.$_POST['non_motor_conviction1'].'</p>';
        }

        $message .= '<p><b>Any motor accident (fault or non fault) or claims (whether claim made or not) in the last 5 years? :</b> '.$_POST['DVLA1'].'</p>';
        $message .= '<p><b>Any motor convictions fixed penalties or disqualification in the last 5 years? :</b> '.$_POST['driverDetails1'].'</p>';

        if ($_POST['DVLA1'] == "Yes"){
            $message .= '<br><p><h3>Motor Accident 1</h3></p>';
            $message .= '<p><b>Type :</b> '.$_POST['type1'].'</p>';
            $message .= '<p><b>Date :</b> '.(strtotime($_POST['accidentDate1'])? date("d-m-Y", strtotime($_POST['accidentDate1'])):"").'</p>';
            $message .= '<p><b>Damage :</b> '.$_POST['damageType1'].'</p>';
            $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['damageCost1'].'</p>';
            $message .= '<p><b>Fault :</b> '.$_POST['faultType1'].'</p>';
            $message .= '<p><b>Any Injuries? :</b> '.$_POST['injury1'].'</p>';

            if ($_POST['type2'] != "")
            {
                $message .= '<p><h3>Motor Accident 2</h3></p>';
                $message .= '<p><b>Type :</b> '.$_POST['type2'].'</p>';
                $message .= '<p><b>Date :</b> '.(strtotime($_POST['accidentDate2'])? date("d-m-Y", strtotime($_POST['accidentDate2'])):"").'</p>';
                $message .= '<p><b>Damage :</b> '.$_POST['damageType2'].'</p>';
                $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['damageCost2'].'</p>';
                $message .= '<p><b>Fault :</b> '.$_POST['faultType2'].'</p>';
                $message .= '<p><b>Any Injuries? :</b> '.$_POST['injury2'].'</p>';
            }

            if ($_POST['type3'] != "")
            {
                $message .= '<p><h3>Motor Accident 3</h3></p>';
                $message .= '<p><b>Type :</b> '.$_POST['type3'].'</p>';
                $message .= '<p><b>Date :</b> '.(strtotime($_POST['accidentDate3'])? date("d-m-Y", strtotime($_POST['accidentDate3'])):"").'</p>';
                $message .= '<p><b>Damage :</b> '.$_POST['damageType3'].'</p>';
                $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['damageCost3'].'</p>';
                $message .= '<p><b>Fault :</b> '.$_POST['faultType3'].'</p>';
                $message .= '<p><b>Any Injuries? :</b> '.$_POST['injury3'].'</p>';
            }

            if ($_POST['type4'] != "")
            {
                $message .= '<p><h3>Motor Accident 4</h3></p>';
                $message .= '<p><b>Type :</b> '.$_POST['type4'].'</p>';
                $message .= '<p><b>Date :</b> '.(strtotime($_POST['accidentDate4'])? date("d-m-Y", strtotime($_POST['accidentDate4'])):"").'</p>';
                $message .= '<p><b>Damage :</b> '.$_POST['damageType4'].'</p>';
                $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['damageCost4'].'</p>';
                $message .= '<p><b>Fault :</b> '.$_POST['faultType4'].'</p>';
                $message .= '<p><b>Any Injuries? :</b> '.$_POST['injury4'].'</p>';
            }
        }

        if  ($_POST['driverDetails1'] == "Yes"){
            $message .= '<br><p><h3>Motor Conviction 1</h3></p>';
            $message .= '<p><b>Conviction Code :</b> '.$_POST['conviction1'].'</p>';
            $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['dateConviction1'])? date("d-m-Y", strtotime($_POST['dateConviction1'])):"").'</p>';
            $message .= '<p><b>Points :</b> '.$_POST['pointConviction1'].'</p>';
            $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fineConviction1'].'</p>';
            $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['banConviction1'].'</p>';

            if ($_POST['conviction2'] != "")
            {
                $message .= '<p><h3>Motor Conviction 2</h3></p>';
                $message .= '<p><b>Conviction Code :</b> '.$_POST['conviction2'].'</p>';
                $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['dateConviction2'])? date("d-m-Y", strtotime($_POST['dateConviction2'])):"").'</p>';
                $message .= '<p><b>Points :</b> '.$_POST['pointConviction2'].'</p>';
                $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fineConviction2'].'</p>';
                $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['banConviction2'].'</p>';
            }

            if ($_POST['conviction3'] != "")
            {
                $message .= '<p><h3>Motor Conviction 3</h3></p>';
                $message .= '<p><b>Conviction Code :</b> '.$_POST['conviction3'].'</p>';
                $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['dateConviction3'])? date("d-m-Y", strtotime($_POST['dateConviction3'])):"").'</p>';
                $message .= '<p><b>Points :</b> '.$_POST['pointConviction3'].'</p>';
                $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fineConviction3'].'</p>';
                $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['banConviction3'].'</p>';
            }

            if ($_POST['conviction4'] != "")
            {
                $message .= '<p><h3>Motor Conviction 4</h3></p>';
                $message .= '<p><b>Conviction Code :</b> '.$_POST['conviction4'].'</p>';
                $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['dateConviction4'])? date("d-m-Y", strtotime($_POST['dateConviction4'])):"").'</p>';
                $message .= '<p><b>Points :</b> '.$_POST['pointConviction4'].'</p>';
                $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fineConviction4'].'</p>';
                $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['banConviction4'].'</p>';
            }
        }

        $message .= '<br><p><b>Would you like to add another Additional Driver? :</b> '.$_POST['additonalDriver2'].'</p>';

        if ($_POST['additonalDriver2'] == "Yes"){
            $message .= '<p><h3>Additional Driver 2</h3></p>';
            $message .= '<p><b>Title :</b> '.$_POST['title2'].'</p>';
            $message .= '<p><b>First Name :</b> '.$_POST['firstName2'].'</p>';
            $message .= '<p><b>Surname :</b> '.$_POST['surname2'].'</p>';
            $message .= '<p><b>Relationship To Policy Holder :</b> '.$_POST['policyHolder2'].'</p>';
            $message .= '<p><b>Date of Birth :</b> '.(strtotime($_POST['birthDate2'])? date("d-m-Y", strtotime($_POST['birthDate2'])):"").'</p>';
            $message .= '<p><b>Marital Status :</b> '.$_POST['maritalStatus2'].'</p>';
            $message .= '<p><b>Employment Status :</b> '.$_POST['employmentStatus2'].'</p>';
            $message .= '<p><b>If Employed/Self Employed, What is your occupation :</b> '.$_POST['occupation2'].'</p>';
            $message .= '<p><b>If employed/Self-employed, what is your business :</b> '.$_POST['business2'].'</p>';
            $message .= '<p><b>Type of license :</b> '.$_POST['licenseType2'].'</p>';
            $message .= '<p><b>Period License held for :</b> '.$_POST['licensePeriod2'].'</p>';
            $message .= '<p><b>If held for 4 years or less, what date was licence obtained? :</b> '.(strtotime($_POST['licenceObtain2'])? date("d-m-Y", strtotime($_POST['licenceObtain2'])):"").'</p>';

            if ($_POST['drivingLicence2'] == "Yes"){
                $message .= '<p><b>Please enter your 16 character driving licence number :</b> '.$_POST['licenceNumber2'].'</p>';
            }

            $message .= '<p><b>DVLA medical conditions or disabilities? :</b> '.$_POST['DVLAconditions2'].'</p>';
            $message .= '<p><b>Were you born in the UK? :</b> '.$_POST['bornPlace2'].'</p>';
            $message .= '<p><b>If No, when did you last become a UK resident? :</b> '.(strtotime($_POST['Ukresident2'])? date("d-m-Y", strtotime($_POST['Ukresident2'])):"").'</p>';
            $message .= '<p><b>Use of any other vehicles? :</b> '.$_POST['otherVehicles2'].'</p>';
            $message .= '<p><b>Non motoring criminal convictions? :</b> '.$_POST['criminalConviction2'].'</p>';

            if  ($_POST['criminalConviction2'] == "Yes")
            {
                $message .= '<p><b>Describe the conviction :</b> '.$_POST['non_motor_conviction2'].'</p>';
            }

            $message .= '<p><b>Any motor accident (fault or non fault) or claims (whether claim made or not) in the last 5 years? :</b> '.$_POST['DVLA2'].'</p>';
            $message .= '<p><b>Any motor convictions fixed penalties or disqualification in the last 5 years? :</b> '.$_POST['driverDetails2'].'</p>';

            if ($_POST['DVLA2'] == "Yes"){
                $message .= '<br><p><h3>Motor Accident 1</h3></p>';
                $message .= '<p><b>Type :</b> '.$_POST['type5'].'</p>';
                $message .= '<p><b>Date :</b> '.(strtotime($_POST['accidentDate5'])? date("d-m-Y", strtotime($_POST['accidentDate5'])):"").'</p>';
                $message .= '<p><b>Damage :</b> '.$_POST['damageType5'].'</p>';
                $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['damageCost5'].'</p>';
                $message .= '<p><b>Fault :</b> '.$_POST['faultType5'].'</p>';
                $message .= '<p><b>Any Injuries? :</b> '.$_POST['injury5'].'</p>';

                if ($_POST['type6'] != "")
                {
                    $message .= '<p><h3>Motor Accident 2</h3></p>';
                    $message .= '<p><b>Type :</b> '.$_POST['type6'].'</p>';
                    $message .= '<p><b>Date :</b> '.(strtotime($_POST['accidentDate6'])? date("d-m-Y", strtotime($_POST['accidentDate6'])):"").'</p>';
                    $message .= '<p><b>Damage :</b> '.$_POST['damageType6'].'</p>';
                    $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['damageCost6'].'</p>';
                    $message .= '<p><b>Fault :</b> '.$_POST['faultType6'].'</p>';
                    $message .= '<p><b>Any Injuries? :</b> '.$_POST['injury6'].'</p>';
                }

                if ($_POST['type7'] != "")
                {
                    $message .= '<p><h3>Motor Accident 3</h3></p>';
                    $message .= '<p><b>Type :</b> '.$_POST['type7'].'</p>';
                    $message .= '<p><b>Date :</b> '.(strtotime($_POST['accidentDate7'])? date("d-m-Y", strtotime($_POST['accidentDate7'])):"").'</p>';
                    $message .= '<p><b>Damage :</b> '.$_POST['damageType7'].'</p>';
                    $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['damageCost7'].'</p>';
                    $message .= '<p><b>Fault :</b> '.$_POST['faultType7'].'</p>';
                    $message .= '<p><b>Any Injuries? :</b> '.$_POST['injury7'].'</p>';
                }

                if ($_POST['type8'] != "")
                {
                    $message .= '<p><h3>Motor Accident 4</h3></p>';
                    $message .= '<p><b>Type :</b> '.$_POST['type8'].'</p>';
                    $message .= '<p><b>Date :</b> '.(strtotime($_POST['accidentDate8'])? date("d-m-Y", strtotime($_POST['accidentDate8'])):"").'</p>';
                    $message .= '<p><b>Damage :</b> '.$_POST['damageType8'].'</p>';
                    $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['damageCost8'].'</p>';
                    $message .= '<p><b>Fault :</b> '.$_POST['faultType8'].'</p>';
                    $message .= '<p><b>Any Injuries? :</b> '.$_POST['injury8'].'</p>';
                }
            }

            if  ($_POST['driverDetails2'] == "Yes"){
                $message .= '<br><p><h3>Motor Conviction 1</h3></p>';
                $message .= '<p><b>Conviction Code :</b> '.$_POST['conviction5'].'</p>';
                $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['dateConviction5'])? date("d-m-Y", strtotime($_POST['dateConviction5'])):"").'</p>';
                $message .= '<p><b>Points :</b> '.$_POST['pointConviction5'].'</p>';
                $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fineConviction5'].'</p>';
                $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['banConviction5'].'</p>';

                if ($_POST['conviction6'] != "")
                {
                    $message .= '<p><h3>Motor Conviction 2</h3></p>';
                    $message .= '<p><b>Conviction Code :</b> '.$_POST['conviction6'].'</p>';
                    $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['dateConviction6'])? date("d-m-Y", strtotime($_POST['dateConviction6'])):"").'</p>';
                    $message .= '<p><b>Points :</b> '.$_POST['pointConviction6'].'</p>';
                    $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fineConviction6'].'</p>';
                    $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['banConviction6'].'</p>';
                }

                if ($_POST['conviction7'] != "")
                {
                    $message .= '<p><h3>Motor Conviction 3</h3></p>';
                    $message .= '<p><b>Conviction Code :</b> '.$_POST['conviction7'].'</p>';
                    $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['dateConviction7'])? date("d-m-Y", strtotime($_POST['dateConviction7'])):"").'</p>';
                    $message .= '<p><b>Points :</b> '.$_POST['pointConviction7'].'</p>';
                    $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fineConviction7'].'</p>';
                    $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['banConviction7'].'</p>';
                }

                if ($_POST['conviction8'] != "")
                {
                    $message .= '<p><h3>Motor Conviction 4</h3></p>';
                    $message .= '<p><b>Conviction Code :</b> '.$_POST['conviction8'].'</p>';
                    $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['dateConviction8'])? date("d-m-Y", strtotime($_POST['dateConviction8'])):"").'</p>';
                    $message .= '<p><b>Points :</b> '.$_POST['pointConviction8'].'</p>';
                    $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fineConviction8'].'</p>';
                    $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['banConviction8'].'</p>';
                }
            }
        }
    }

    $message .= '<br><h3>Additional Comments</h3>';
    $message .= '<p><small>'.$_POST['addComment'].'</small></p>';
    $message .= '<br><p><b>Terms & Privacy Policy :</b> '.$_POST['agreement'].'</p>';
    $message .= '</body></html>';

    mail($to, $subject, $message, $headers);
}



//-----------------Motor Submit--------------------------
if(isset($_POST['submitMotor'])){
    $to='quotes@getinsure.co.uk';
    $subject='Motor Insurance for '.$_POST['firstName'].' '.$_POST['surname'];
    $headers="From: Motor Insurance Form\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $message = '<html><body style= "font-size: 18px;">';
    $message .= '<h1>Motor Trade insurance form, submitted by <span style="color: #3380ff">'.$_POST['firstName'].' '.$_POST['surname'].'</span></h1>';
    $message .= '<p><b>Online or Phone : '.$_POST['online'].'</b></p>';
    $message .= '<p><b>How did you hear about us? :</b> '.$_POST['hearAboutUs'].'</p>';
    $message .= '<p><b>Friend or Family Name :</b> '.$_POST['referrer'].'</p>';
    $message .= '<p><b>Have you or any of the drivers ever had insurance declined, cancelled or special terms imposed? :</b> '.$_POST['declined'].'</p>';

    if ($_POST['declined'] == "Yes"){
        $message .= '<p><b>Insurer Name :</b> '.$_POST['insurar'].'</p>';
    }

    $message .= '<br><br><h2>Personal Information</h2>';
    $message .= '<p><b>Title :</b> '.$_POST['title'].'</p>';
    $message .= '<p><b>First Name :</b> '.$_POST['firstName'].'</p>';
    $message .= '<p><b>Surname :</b> '.$_POST['surname'].'</p>';
    $message .= '<p><b>Date of Birth :</b> '.(strtotime($_POST['dateofBirth'])? date("d-m-Y", strtotime($_POST['dateofBirth'])):"").'</p>';
    $message .= '<p><b>House Number / Name :</b> '.$_POST['houseNumber'].'</p>';
    $message .= '<p><b>First Line of Address :</b> '.$_POST['addressFirsLine'].'</p>';
    $message .= '<p><b>Postcode :</b> '.$_POST['postcode'].'</p>';
    $message .= '<p><b>Trading Address (If Different) :</b> '.$_POST['tradingAddr'].'</p>';

    $message .= '<br><br><h2>Contact Information</h2>';
    $message .= '<p><b>Email :</b> '.$_POST['email'].'</p>';
    $message .= '<p><b>Phone Number :</b> '.$_POST['phone'].'</p>';
    $message .= '<p><b>Mobile Number :</b> '.$_POST['mobile'].'</p>';
    $message .= '<p><b>Please contact me via :</b> '.$_POST['viaContact'].'</p>';

    $message .= '<br><br><h2>Driving History</h2>';
    $message .= '<p><b>Licence Type :</b> '.$_POST['licenceType'].'</p>';
    $message .= '<p><b>Period Licence Held :</b> '.$_POST['licencePeriod'].'</p>';
    $message .= '<p><b>If held for 3 years or less, what date was licence obtained :</b> '.(strtotime($_POST['licenseDate'])? date("d-m-Y", strtotime($_POST['licenseDate'])):"").'</p>';
    $message .= '<p><b>Please enter your 16 character driving licence number :</b> '.$_POST['enterLicenceNumber'].'</p>';
    $message .= '<p><b>Any motor accident (fault or non fault) or claims (whether claim made or not) in the last 5 years? :</b> '.$_POST['DVLAtop'].'</p>';
    $message .= '<p><b>Any motor convictions fixed penalties or disqualification in the last 5 years? :</b> '.$_POST['driverDetailstop'].'</p>';

    if ($_POST['DVLAtop'] == "Yes"){
        $message .= '<br><p><h3>Motor Accident 1</h3></p>';
        $message .= '<p><b>Type :</b> '.$_POST['convictionCodetop1'].'</p>';
        $message .= '<p><b>Date :</b> '.(strtotime($_POST['date1'])? date("d-m-Y", strtotime($_POST['date1'])):"").'</p>';
        $message .= '<p><b>Damage :</b> '.$_POST['damage1'].'</p>';
        $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['cost1'].'</p>';
        $message .= '<p><b>Fault :</b> '.$_POST['fault1'].'</p>';
        $message .= '<p><b>Any Injuries? :</b> '.$_POST['injuries1'].'</p>';

        if ($_POST['convictionCodetop2'] != "")
        {
            $message .= '<p><h3>Motor Accident 2</h3></p>';
            $message .= '<p><b>Type :</b> '.$_POST['convictionCodetop2'].'</p>';
            $message .= '<p><b>Date :</b> '.(strtotime($_POST['date2'])? date("d-m-Y", strtotime($_POST['date2'])):"").'</p>';
            $message .= '<p><b>Damage :</b> '.$_POST['damage2'].'</p>';
            $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['cost2'].'</p>';
            $message .= '<p><b>Fault :</b> '.$_POST['fault2'].'</p>';
            $message .= '<p><b>Any Injuries? :</b> '.$_POST['injuries2'].'</p>';
        }

        if ($_POST['convictionCodetop3'] != "")
        {
            $message .= '<p><h3>Motor Accident 3</h3></p>';
            $message .= '<p><b>Type :</b> '.$_POST['convictionCodetop3'].'</p>';
            $message .= '<p><b>Date :</b> '.(strtotime($_POST['date3'])? date("d-m-Y", strtotime($_POST['date3'])):"").'</p>';
            $message .= '<p><b>Damage :</b> '.$_POST['damage3'].'</p>';
            $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['cost3'].'</p>';
            $message .= '<p><b>Fault :</b> '.$_POST['fault3'].'</p>';
            $message .= '<p><b>Any Injuries? :</b> '.$_POST['injuries3'].'</p>';
        }

        if ($_POST['convictionCodetop4'] != "")
        {
            $message .= '<p><h3>Motor Accident 4</h3></p>';
            $message .= '<p><b>Type :</b> '.$_POST['convictionCodetop4'].'</p>';
            $message .= '<p><b>Date :</b> '.(strtotime($_POST['date4'])? date("d-m-Y", strtotime($_POST['date4'])):"").'</p>';
            $message .= '<p><b>Damage :</b> '.$_POST['damage4'].'</p>';
            $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['cost4'].'</p>';
            $message .= '<p><b>Fault :</b> '.$_POST['fault4'].'</p>';
            $message .= '<p><b>Any Injuries? :</b> '.$_POST['injuries4'].'</p>';
        }
    }
    else{
        $message .= '<br><p><b>Motor Accident 1</b></p>';
        $message .= '<p><b>Motor Accident 2</b></p>';
        $message .= '<p><b>Motor Accident 3</b></p>';
        $message .= '<p><b>Motor Accident 4</b></p>';
    }

    if  ($_POST['driverDetailstop'] == "Yes"){
        $message .= '<br><p><h3>Motor Conviction 1</h3></p>';
        $message .= '<p><b>Conviction Code :</b> '.$_POST['convictionCode1'].'</p>';
        $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['convictionDate1'])? date("d-m-Y", strtotime($_POST['convictionDate1'])):"").'</p>';
        $message .= '<p><b>Points :</b> '.$_POST['points1'].'</p>';
        $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fine1'].'</p>';
        $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['ban1'].'</p>';

        if ($_POST['convictionCode2'] != "")
        {
            $message .= '<p><h3>Motor Conviction 2</h3></p>';
            $message .= '<p><b>Conviction Code :</b> '.$_POST['convictionCode2'].'</p>';
            $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['convictionDate2'])? date("d-m-Y", strtotime($_POST['convictionDate2'])):"").'</p>';
            $message .= '<p><b>Points :</b> '.$_POST['points2'].'</p>';
            $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fine2'].'</p>';
            $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['ban2'].'</p>';
        }

        if ($_POST['convictionCode3'] != "")
        {
            $message .= '<p><h3>Motor Conviction 3</h3></p>';
            $message .= '<p><b>Conviction Code :</b> '.$_POST['convictionCode3'].'</p>';
            $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['convictionDate3'])? date("d-m-Y", strtotime($_POST['convictionDate3'])):"").'</p>';
            $message .= '<p><b>Points :</b> '.$_POST['points3'].'</p>';
            $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fine3'].'</p>';
            $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['ban3'].'</p>';
        }

        if ($_POST['convictionCode4'] != "")
        {
            $message .= '<p><h3>Motor Conviction 4</h3></p>';
            $message .= '<p><b>Conviction Code :</b> '.$_POST['convictionCode4'].'</p>';
            $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['convictionDate4'])? date("d-m-Y", strtotime($_POST['convictionDate4'])):"").'</p>';
            $message .= '<p><b>Points :</b> '.$_POST['points4'].'</p>';
            $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fine4'].'</p>';
            $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['ban4'].'</p>';
        }
    }
    else{
        $message .= '<br><p><b>Motor Conviction 1</b></p>';
        $message .= '<p><b>Motor Conviction 2</b></p>';
        $message .= '<p><b>Motor Conviction 3</b></p>';
        $message .= '<p><b>Motor Conviction 4</b></p>';
    }

    $message .= '<br><br><h2>Vehicle Details</h2>';
    $message .= '<p><b>Do you do only buying and selling or vehicle recovery as well? :</b> '.$_POST['buySell'].'</p>';
    $message .= '<p><b>Do you do trading from home? :</b> '.$_POST['tradingFromHome'].'</p>';
    $message .= '<p><b>Are you Trading as Limited Company or Sole Trader? :</b> '.$_POST['soleTrader'].'</p>';
    $message .= '<p><b>Do you have a trading name? :</b> '.$_POST['tradingName'].'</p>';
    $message .= '<p><b>Do you have a recovery truck? :</b> '.$_POST['recoveryTruck'].'</p>';
    $message .= '<p><b>If yes, what’s the make & model :</b> '.$_POST['model'].'</p>';
    $message .= '<p><b>Have you ever had a Motor Trade Policy? :</b> '.$_POST['tradePolicyExp'].'</p>';
    $message .= '<p><b>If yes who was your insurer previously :</b> '.$_POST['insurerPrev'].'</p>';
    $message .= '<p><b>Approximately, How Many Cars you Sell in a Month? :</b> '.$_POST['carSell'].'</p>';
    $message .= '<p><b>Vehicle registrations at the Present :</b> '.$_POST['vehicleReg1'].', '.$_POST['vehicleReg2'].', '.$_POST['vehicleReg2'].'</p>';
    $message .= '<p><b>What’s the projected turnover for your business? :</b> '.$_POST['projectedTurnover'].'</p>';
    $message .= '<p><b>How Many Cars do You Keep in your Possession at a time? :</b> '.$_POST['prossessionQTY'].'</p>';
    $message .= '<p><b>Do you keep the car on the road or in the Driveway or Garage? :</b> '.$_POST['keepCar'].'</p>';
    $message .= '<p><b>If you have garage or driveway’ how many cars it can hold at a time? :</b> '.$_POST['garageCarQTY'].'</p>';
    $message .= '<p><b>What’s the maximum individual value of the cars you hold? :</b> '.$_POST['maxValue'].'</p>';
    $message .= '<p><b>Do you require demonstration cover? :</b> '.$_POST['demonstrationCover'].'</p>';
    $message .= '<p><b>What Type of Cover do you Prefer? :</b> '.$_POST['preferableCover'].'</p>';
    $message .= '<p><b>Do you have No Claim Bonus on Motor Trade policy? :</b> '.$_POST['noClaimMotor'].'</p>';
    $message .= '<p><b>Would you like to pay ‘monthly or one off’ for your insurance :</b> '.$_POST['payMonthly'].'</p>';
    $message .= '<p><b>When would you like the policy to start? :</b> '.(strtotime($_POST['policyStartDate'])? date("d-m-Y", strtotime($_POST['policyStartDate'])):"").'</p>';

    $message .= '<br><br><h2>Additional Drivers</h2>';
    $message .= '<p><b>Would you like to add an Additional Driver? :</b> '.$_POST['additonalDriver'].'</p>';

    if ($_POST['additonalDriver'] == "Yes"){
        $message .= '<br><p><h3>Additional Driver 1</h3></p>';
        $message .= '<p><b>Title :</b> '.$_POST['title1'].'</p>';
        $message .= '<p><b>First Name :</b> '.$_POST['firstName1'].'</p>';
        $message .= '<p><b>Surname :</b> '.$_POST['surname1'].'</p>';
        $message .= '<p><b>Date of Birth :</b> '.(strtotime($_POST['birthDate'])? date("d-m-Y", strtotime($_POST['birthDate'])):"").'</p>';
        $message .= '<p><b>Additional Driver\'s Address (if known) :</b> '.$_POST['addDriverAddr'].'</p>';
        $message .= '<p><b>Additional Driver\'s Contact Number (if known) :</b> '.$_POST['addDriverContact'].'</p>';
        $message .= '<p><b>Type of license :</b> '.$_POST['licenseType'].'</p>';
        $message .= '<p><b>Period License held for :</b> '.$_POST['licensePeriod'].'</p>';
        $message .= '<p><b>If held for 3 years or less, what date was licence obtained? :</b> '.(strtotime($_POST['licenceObtain'])? date("d-m-Y", strtotime($_POST['licenceObtain'])):"").'</p>';
        $message .= '<p><b>Any motor accident (fault or non fault) or claims (whether claim made or not) in the last 5 years? :</b> '.$_POST['DVLA'].'</p>';
        $message .= '<p><b>Any motor convictions fixed penalties or disqualification in the last 5 years? :</b> '.$_POST['driverDetails'].'</p>';

        if ($_POST['DVLA'] == "Yes"){
            $message .= '<br><p><h3>Motor Accident 1</h3></p>';
            $message .= '<p><b>Type :</b> '.$_POST['type1'].'</p>';
            $message .= '<p><b>Date :</b> '.(strtotime($_POST['accidentDate1'])? date("d-m-Y", strtotime($_POST['accidentDate1'])):"").'</p>';
            $message .= '<p><b>Damage :</b> '.$_POST['damageType1'].'</p>';
            $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['damageCost1'].'</p>';
            $message .= '<p><b>Fault :</b> '.$_POST['faultType1'].'</p>';
            $message .= '<p><b>Any Injuries? :</b> '.$_POST['injury1'].'</p>';

            if ($_POST['type2'] != "")
            {
                $message .= '<p><h3>Motor Accident 2</h3></p>';
                $message .= '<p><b>Type :</b> '.$_POST['type2'].'</p>';
                $message .= '<p><b>Date :</b> '.(strtotime($_POST['accidentDate2'])? date("d-m-Y", strtotime($_POST['accidentDate2'])):"").'</p>';
                $message .= '<p><b>Damage :</b> '.$_POST['damageType2'].'</p>';
                $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['damageCost2'].'</p>';
                $message .= '<p><b>Fault :</b> '.$_POST['faultType2'].'</p>';
                $message .= '<p><b>Any Injuries? :</b> '.$_POST['injury2'].'</p>';
            }

            if ($_POST['type3'] != "")
            {
                $message .= '<p><h3>Motor Accident 3</h3></p>';
                $message .= '<p><b>Type :</b> '.$_POST['type3'].'</p>';
                $message .= '<p><b>Date :</b> '.(strtotime($_POST['accidentDate3'])? date("d-m-Y", strtotime($_POST['accidentDate3'])):"").'</p>';
                $message .= '<p><b>Damage :</b> '.$_POST['damageType3'].'</p>';
                $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['damageCost3'].'</p>';
                $message .= '<p><b>Fault :</b> '.$_POST['faultType3'].'</p>';
                $message .= '<p><b>Any Injuries? :</b> '.$_POST['injury3'].'</p>';
            }

            if ($_POST['type4'] != "")
            {
                $message .= '<p><h3>Motor Accident 4</h3></p>';
                $message .= '<p><b>Type :</b> '.$_POST['type4'].'</p>';
                $message .= '<p><b>Date :</b> '.(strtotime($_POST['accidentDate4'])? date("d-m-Y", strtotime($_POST['accidentDate4'])):"").'</p>';
                $message .= '<p><b>Damage :</b> '.$_POST['damageType4'].'</p>';
                $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['damageCost4'].'</p>';
                $message .= '<p><b>Fault :</b> '.$_POST['faultType4'].'</p>';
                $message .= '<p><b>Any Injuries? :</b> '.$_POST['injury4'].'</p>';
            }
        }

        if  ($_POST['driverDetails'] == "Yes"){
            $message .= '<br><p><h3>Motor Conviction 1</h3></p>';
            $message .= '<p><b>Conviction Code :</b> '.$_POST['conviction1'].'</p>';
            $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['dateConviction1'])? date("d-m-Y", strtotime($_POST['dateConviction1'])):"").'</p>';
            $message .= '<p><b>Points :</b> '.$_POST['pointConviction1'].'</p>';
            $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fineConviction1'].'</p>';
            $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['banConviction1'].'</p>';

            if ($_POST['conviction2'] != "")
            {
                $message .= '<p><h3>Motor Conviction 2</h3></p>';
                $message .= '<p><b>Conviction Code :</b> '.$_POST['conviction2'].'</p>';
                $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['dateConviction2'])? date("d-m-Y", strtotime($_POST['dateConviction2'])):"").'</p>';
                $message .= '<p><b>Points :</b> '.$_POST['pointConviction2'].'</p>';
                $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fineConviction2'].'</p>';
                $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['banConviction2'].'</p>';
            }

            if ($_POST['conviction3'] != "")
            {
                $message .= '<p><h3>Motor Conviction 3</h3></p>';
                $message .= '<p><b>Conviction Code :</b> '.$_POST['conviction3'].'</p>';
                $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['dateConviction3'])? date("d-m-Y", strtotime($_POST['dateConviction3'])):"").'</p>';
                $message .= '<p><b>Points :</b> '.$_POST['pointConviction3'].'</p>';
                $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fineConviction3'].'</p>';
                $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['banConviction3'].'</p>';
            }

            if ($_POST['conviction4'] != "")
            {
                $message .= '<p><h3>Motor Conviction 4</h3></p>';
                $message .= '<p><b>Conviction Code :</b> '.$_POST['conviction4'].'</p>';
                $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['dateConviction4'])? date("d-m-Y", strtotime($_POST['dateConviction4'])):"").'</p>';
                $message .= '<p><b>Points :</b> '.$_POST['pointConviction4'].'</p>';
                $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fineConviction4'].'</p>';
                $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['banConviction4'].'</p>';
            }
        }

        $message .= '<br><p><b>Would you like to add another Additional Driver? :</b> '.$_POST['additonalDriver2'].'</p>';

        if ($_POST['additonalDriver2'] == "Yes"){
            $message .= '<br><p><h3>Additional Driver 2</h3></p>';
            $message .= '<p><b>Title :</b> '.$_POST['title2'].'</p>';
            $message .= '<p><b>First Name :</b> '.$_POST['firstName2'].'</p>';
            $message .= '<p><b>Surname :</b> '.$_POST['surname2'].'</p>';
            $message .= '<p><b>Date of Birth :</b> '.(strtotime($_POST['birthDate2'])? date("d-m-Y", strtotime($_POST['birthDate2'])):"").'</p>';
            $message .= '<p><b>Additional Driver\'s Address (if known) :</b> '.$_POST['addDriverAddr2'].'</p>';
            $message .= '<p><b>Additional Driver\'s Contact Number (if known) :</b> '.$_POST['addDriverContact2'].'</p>';
            $message .= '<p><b>Type of license :</b> '.$_POST['licenseType2'].'</p>';
            $message .= '<p><b>Period License held for :</b> '.$_POST['licensePeriod2'].'</p>';
            $message .= '<p><b>If held for 3 years or less, what date was licence obtained? :</b> '.(strtotime($_POST['licenceObtain2'])? date("d-m-Y", strtotime($_POST['licenceObtain2'])):"").'</p>';
            $message .= '<p><b>Any motor accident (fault or non fault) or claims (whether claim made or not) in the last 5 years? :</b> '.$_POST['DVLA2'].'</p>';
            $message .= '<p><b>Any motor convictions fixed penalties or disqualification in the last 5 years? :</b> '.$_POST['driverDetails2'].'</p>';

            if ($_POST['DVLA2'] == "Yes"){
                $message .= '<br><p><h3>Motor Accident 1</h3></p>';
                $message .= '<p><b>Type :</b> '.$_POST['type5'].'</p>';
                $message .= '<p><b>Date :</b> '.(strtotime($_POST['accidentDate5'])? date("d-m-Y", strtotime($_POST['accidentDate5'])):"").'</p>';
                $message .= '<p><b>Damage :</b> '.$_POST['damageType5'].'</p>';
                $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['damageCost5'].'</p>';
                $message .= '<p><b>Fault :</b> '.$_POST['faultType5'].'</p>';
                $message .= '<p><b>Any Injuries? :</b> '.$_POST['injury5'].'</p>';

                if ($_POST['type6'] != "")
                {
                    $message .= '<p><h3>Motor Accident 2</h3></p>';
                    $message .= '<p><b>Type :</b> '.$_POST['type6'].'</p>';
                    $message .= '<p><b>Date :</b> '.(strtotime($_POST['accidentDate6'])? date("d-m-Y", strtotime($_POST['accidentDate6'])):"").'</p>';
                    $message .= '<p><b>Damage :</b> '.$_POST['damageType6'].'</p>';
                    $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['damageCost6'].'</p>';
                    $message .= '<p><b>Fault :</b> '.$_POST['faultType6'].'</p>';
                    $message .= '<p><b>Any Injuries? :</b> '.$_POST['injury6'].'</p>';
                }

                if ($_POST['type7'] != "")
                {
                    $message .= '<p><h3>Motor Accident 3</h3></p>';
                    $message .= '<p><b>Type :</b> '.$_POST['type7'].'</p>';
                    $message .= '<p><b>Date :</b> '.(strtotime($_POST['accidentDate7'])? date("d-m-Y", strtotime($_POST['accidentDate7'])):"").'</p>';
                    $message .= '<p><b>Damage :</b> '.$_POST['damageType7'].'</p>';
                    $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['damageCost7'].'</p>';
                    $message .= '<p><b>Fault :</b> '.$_POST['faultType7'].'</p>';
                    $message .= '<p><b>Any Injuries? :</b> '.$_POST['injury7'].'</p>';
                }

                if ($_POST['type8'] != "")
                {
                    $message .= '<p><h3>Motor Accident 4</h3></p>';
                    $message .= '<p><b>Type :</b> '.$_POST['type8'].'</p>';
                    $message .= '<p><b>Date :</b> '.(strtotime($_POST['accidentDate8'])? date("d-m-Y", strtotime($_POST['accidentDate8'])):"").'</p>';
                    $message .= '<p><b>Damage :</b> '.$_POST['damageType8'].'</p>';
                    $message .= '<p><b>Cost(&pound;) - if known :</b> '.$_POST['damageCost8'].'</p>';
                    $message .= '<p><b>Fault :</b> '.$_POST['faultType8'].'</p>';
                    $message .= '<p><b>Any Injuries? :</b> '.$_POST['injury8'].'</p>';
                }
            }

            if  ($_POST['driverDetails2'] == "Yes"){
                $message .= '<br><p><h3>Motor Conviction 1</h3></p>';
                $message .= '<p><b>Conviction Code :</b> '.$_POST['conviction5'].'</p>';
                $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['dateConviction5'])? date("d-m-Y", strtotime($_POST['dateConviction5'])):"").'</p>';
                $message .= '<p><b>Points :</b> '.$_POST['pointConviction5'].'</p>';
                $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fineConviction5'].'</p>';
                $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['banConviction5'].'</p>';

                if ($_POST['conviction6'] != "")
                {
                    $message .= '<p><h3>Motor Conviction 2</h3></p>';
                    $message .= '<p><b>Conviction Code :</b> '.$_POST['conviction6'].'</p>';
                    $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['dateConviction6'])? date("d-m-Y", strtotime($_POST['dateConviction6'])):"").'</p>';
                    $message .= '<p><b>Points :</b> '.$_POST['pointConviction6'].'</p>';
                    $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fineConviction6'].'</p>';
                    $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['banConviction6'].'</p>';
                }

                if ($_POST['conviction7'] != "")
                {
                    $message .= '<p><h3>Motor Conviction 3</h3></p>';
                    $message .= '<p><b>Conviction Code :</b> '.$_POST['conviction7'].'</p>';
                    $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['dateConviction7'])? date("d-m-Y", strtotime($_POST['dateConviction7'])):"").'</p>';
                    $message .= '<p><b>Points :</b> '.$_POST['pointConviction7'].'</p>';
                    $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fineConviction7'].'</p>';
                    $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['banConviction7'].'</p>';
                }

                if ($_POST['conviction8'] != "")
                {
                    $message .= '<p><h3>Motor Conviction 4</h3></p>';
                    $message .= '<p><b>Conviction Code :</b> '.$_POST['conviction8'].'</p>';
                    $message .= '<p><b>Date of Conviction :</b> '.(strtotime($_POST['dateConviction8'])? date("d-m-Y", strtotime($_POST['dateConviction8'])):"").'</p>';
                    $message .= '<p><b>Points :</b> '.$_POST['pointConviction8'].'</p>';
                    $message .= '<p><b>Fine(&pound;) - if any :</b> '.$_POST['fineConviction8'].'</p>';
                    $message .= '<p><b>Ban(months) - if any :</b> '.$_POST['banConviction8'].'</p>';
                }
            }
        }
    }

    $message .= '<br><h3>Additional Comments</h3>';
    $message .= '<p><small>'.$_POST['addComment'].'</small></p>';
    $message .= '<br><p><b>Terms & Privacy Policy :</b> '.$_POST['agreement'].'</p>';
    $message .= '</body></html>';

    mail($to, $subject, $message, $headers);
}

?>





<!-- Submission Page -->
<!doctype html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <!-- Fontawsome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">


    <!-- Font  -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <!-- Style CSS -->
    <link rel="stylesheet" href="../css/style.css" type="text/css">


    <link rel="shortcut icon" type="image/png" href="../img/fav.png">
    <title>GET Insure | Thank You</title>
</head>
<body>

<!-------- Navbar & Carousel -------->
<section class="head-text">
    <div class="container">
        <div class="nav-header pb-2">
            <div class="row">
                <div class="col-md-3">
                    <a class="" href="../index.html" style="text-decoration: none;">
                        <img src="../img/logo.png" width="400px" height="148px" class="img-fluid d-inline-block" alt="Logo" style="margin-top: 15px; border-radius: 10px;">
                    </a>
                </div>
                <div class="col-md-9 mt-4">
                    <div class="row">
                        <!--<div class="pl-4" style="margin-top: 50px;">-->
                        <!--<h4 style="color: white; font-family: 'Comic Sans MS'; cursor: default;font-style: italic;letter-spacing: 4px;font-size: 25px;font-weight: bold; color: #17045c;">Get Insured</h4>-->
                        <!--</div>-->
                        <div style="margin-top: 43px; margin-left: 25px;">
                            <div class="font-weight-bold">
                                <div class="d-flex justify-content-end" style="letter-spacing: 3px;">
                                    <span class="pr-2" style="cursor: default; font-size: 35px;">CALL US FOR FREE :</span>
                                    <span class="text-dark" style="font-size: 55px;margin-top: -15px;"><a href="tel:0330 113 9686" style="text-decoration: none;">0330 113 9686</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sm-header" style="background-color: #4f5466; color: white;">
    <div class="container">
        <div class="nav-header-sm d-flex justify-content-between">
            <div class="pt-1">
                <span>Call Us : <a href="tel:0330 113 9686" style="text-decoration: none; color: #fff;">0330 113 9686 <i class="fas fa-phone"></i></a></span>
            </div>
            <div>
                <ul class="list-unstyled d-flex">
                    <li><a class="pr-2" href=""> <i class="fab fa-facebook-square fa-2x"></i></a></li>

                    <li><a class="pr-2" href=""><i class="fab fa-twitter-square fa-2x"></i></a></li>

                    <li><a  href=""> <i class="fab fa-linkedin fa-2x"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<nav class="navbar-custom navbar navbar-expand-lg bg-warning navbar-dark sticky-top font">
    <div class="container">
        <button class="navbar-toggler mb-3" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" style="margin-left: -15px">
                <li class="nav-item" style="margin-left: 15px;"><a class="nav-link" href="../index.html">Home</a></li>
                <li style="margin-left: 15px;" class="nav-item"><a class="nav-link" href="../about_us.html">About Us</a></li>
                <li style="margin-left: 15px;" class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="insurances" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Insurances
                        <i class="fas fa-angle-down menu-down-icon"></i>
                    </a>
                    <div class="dropdown-menu text-dark" aria-labelledby="insurances">
                        <a class="dropdown-item" href="../insurances/car_insurance.html">Car Insurance</a>
                        <a class="dropdown-item" href="../insurances/van_insurance.html">Van Insurance</a>
                        <a class="dropdown-item" href="../insurances/motor_trade.html">Motor Trade</a>
                        <a class="dropdown-item" href="../insurances/business_insurance.html">Business Insurance</a>
                        <a class="dropdown-item" href="../insurances/home_insurance.html">Home Insurance</a>
                        <a class="dropdown-item" href="../insurances/accident_management.html">Accident Management</a>
                    </div>
                </li>
                <li style="margin-left: 15px;" class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Quotation Form
                        <i class="fas fa-angle-down menu-down-icon"></i>
                    </a>
                    <div class="dropdown-menu text-dark" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="car_insurance_quotation_form.html">Car Insurance Quotation Form</a>
                        <a class="dropdown-item" href="van_insurance_quotation_form.html">Van Insurance Quotation Form</a>
                        <a class="dropdown-item" href="motor_trade_quotation_form.html">Motor Trade Quotation Form</a>
                        <a class="dropdown-item" href="business_insurance_quotation_form.html">Business Insurance Quotation Form</a>
                        <a class="dropdown-item" href="home_insurance_quotation_form.html">Home Insurance Quotation Form</a>
                        <a class="dropdown-item" href="accident_management_quotation_form.html">Accident Management Form</a>
                    </div>
                </li>
                <li style="margin-left: 15px;" class="nav-item">
                    <a class="nav-link" href="../contact_us.html">Contact Us</a>
                </li>
            </ul>
        </div>
        <a class="img" href="" style="margin-top: 5px;margin-left: 1px;"><img src="../img/logo.png"  alt="company logo" height="20%" width="80px" style="border-radius: 5px;"></a>
    </div>
</nav>

<div aria-label="breadcrumb" class="breadcrumb-div">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thank You</li>
        </ol>
    </div>

</div>

<!-------- Car Insurance Form Starts-------->
<section>
    <div class="container" style="background-color: #f2f2f2">
        <br>
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <h3><span style="color: #0071bc">You Have Successfully Submitted The Quotation Form !</span></h3><br>
                    <h4>This Information Has been Passed Over To One Of Our Consultants.</h4><br>
                    <h4>Now Please Expect A Call From Us Within 24 Hours.</h4><br>
                    <h4>We Will Compare How Much We Can Save For You.</h4><br>
                    <h4><span style="color: orangered">Thank You</span></h4>
                </div>
            </div>
        </div>
    </div>
</section>


<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 com-sm-12">
                <img src="../img/brand-logo.png" alt="" class="img-fluid">
                <img src="../img/kinder.jpg" alt="" width="25%" height="15%" style="margin-top: -50px; margin-left: 90px; border-radius: 2px;" class="img-fluid">
            </div>
            <div class="col-md-3 com-sm-12">
                <h5>INSURANCE PRODUCTS</h5>
                <ul class="list-unstyled">
                    <li><a href="../insurances/car_insurance.html">Car Insurance</a></li>
                    <li><a href="../insurances/van_insurance.html">Van Insurance</a></li>
                    <li><a href="../insurances/motor_trade.html">Motor Trade</a></li>
                    <li><a href="../insurances/business_insurance.html">Business Insurance</a></li>
                    <li><a href="../insurances/home_insurance.html">Home Insurance</a></li>
                    <li><a href="../insurances/accident_management.html">Accident Management</a></li>
                </ul>
            </div>
            <div class="col-md-3 com-sm-12">
                <h5>FILL OUR INSURANCE FORMS</h5>
                <ul class="list-unstyled">
                    <li><a href="car_insurance_quotation_form.html">Car Insurance Quotation Form</a></li>
                    <li><a href="van_insurance_quotation_form.html">Van Insurance Quotation Form</a></li>
                    <li><a href="motor_trade_quotation_form.html">Motor Trade Quotation Form</a></li>
                    <li><a href="business_insurance_quotation_form.html">Business Insurance Quotation Form</a></li>
                    <li><a href="home_insurance_quotation_form.html">Home Insurance Quotation Form</a></li>
                    <li><a href="accident_management_quotation_form.html">Accident Management Form</a></li>
                </ul>
            </div>
            <div class="col-md-3 com-sm-12">
                <h5>CONTACT INFORMATION</h5>
                <address style="font-size: 16px; font-weight: 300; line-height: 1.5em;">
                    27A BROADWAY
                    <br>
                    PETERBOROUGH
                    <br>
                    PE1 1SQ
                    <br>
                    LONDON
                </address>
            </div>
        </div>

        <div class="footer-text" style="margin-top: 10px;">
            <span style="font-weight: bold">
                GET INSURE LIMITED (TRADING AS GET INSURE) DO NOT ENGAGE IN ANY REGULATORY ACTIVITIES HOWEVER, REGISTERED IN ENGLAND & WALES,
                COMPANY NUMBER: 10833649, REGISTERED OFFICE: 27A BROADWAY, PETERBOROUGH, PE1 1SQ, LONDON. GET
                INSURE LIMITED IS REGISTERED WITH THE INFORMATION COMMISSIONER'S OFFICE (REGISTRATION NUMBER: ZA263319) AS WELL AS GDPR COMPLIANT,
                AUTHORISED TO PROCESS PERSONAL DATA UNDER DATA PROTECTION ACT & GDPR 2018.
            </span>
        </div>

        <div class="footer-bottom" style="margin-top: 10px;">
            <div class="nav-header pb-2">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <ul class="list-unstyled text-light pt-4">
                            <li>
                                <a href="../terms_conditons.html">
                                    Terms & Conditions
                                </a>|
                                <a href="../privacy_policy.html">
                                    Privacy Policy
                                </a>
                            </li>
                            <li>
                          <span>
                              Copyright ©
                              <script type="text/javascript">
                                  document.write(new Date().getFullYear());
                              </script>
                              GET INSURE LIMITED <br> All Rights Reserved
                          </span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-12 pt-4">
                        <div class="number">
                            <div class="d-flex justify-content-end font-weight-bold">
                                <span class="pr-4 text-primary">CALL US:</span>
                                <span class=""><a href="tel:0330 113 9686" style="text-decoration: none">0330 113 9686 <i class="fas fa-phone"></i></a></span>
                            </div>
                            <div class="d-flex justify-content-end">
                           <span style="font-size: 12px">
                               YOU CAN RING US <br>FROM 9AM - 6PM <br>(MONDAY - SATURDAY)
                           </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 pt-4" style="text-align: center">
                        <div class="link">
                            <ul class="list-unstyled d-flex justify-content-end">
                                <li><a class="pr-2" href=""> <i class="fab fa-facebook-square fa-2x"></i></a></li>

                                <li><a class="pr-2" href=""><i class="fab fa-twitter-square fa-2x"></i></a></li>

                                <li><a  href=""> <i class="fab fa-linkedin fa-2x"></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</footer>

<a id="gotopbtn" href="#"><i class="fas fa-angle-up" style="color: white;"></i></a>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="../js/main.js"></script>

<script>
    $(window).scroll(function(){
        $('nav').toggleClass('scrolled', $(this).scrollTop() > 100);
    });

</script>

</body>
</html>