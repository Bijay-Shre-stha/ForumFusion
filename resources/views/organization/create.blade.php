<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css" />

    <title>Organization Details Form</title>
</head>
<body>

    <nav>
        <h2>ACAS</h2>
    </nav>

    <form action="{{route ('organization.store')}}" method="post">
        @csrf
        <h2>Organization Details</h2>

        <label for="organizationName">Organization Name:</label>
        <input type="text" id="organizationName" name="organizationName" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="organizationAddress" required>

        <label for="phoneNumber">Phone Number:</label>
        <input type="number" id="phoneNumber" name="organizationPhoneNumber" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="organizationEmail" required>

        <label for="vatNo">VAT Number:</label>
        <input type="number" id="vatNo" name="organizationVatNumber" required>

        <label for="panNo">PAN Number:</label>
        <input type="number" id="panNo" name="organizationPanNumber" required>

        <button type="submit">Submit</button>
    </form>

</body>
</html>
