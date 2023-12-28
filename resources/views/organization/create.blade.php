<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css" />

    <title>Organization Details Form</title>
</head>

<body>

    <nav class="nav">
        <h2>ACAS</h2>
    </nav>

    <form action="{{ route('organization.store') }}" method="post" class="form">
        @csrf
        <h2>Organization Details</h2>

        <label for="organizationName" class="label">Organization Name:</label>
        <input type="text" id="organizationName" name="organizationName" class="input_label" required>

        <label for="address" class="label">Address:</label>
        <input type="text" id="address" name="organizationAddress" class="input_label" required>

        <label for="phoneNumber" class="label">Phone Number:</label>
        <input type="number" id="phoneNumber" name="organizationPhoneNumber"class="input_label" required>

        <label for="email" class="label">Email:</label>
        <input type="email" id="email" name="organizationEmail" class="input_label"required>

        <label for="vatNo" class="label">VAT Number:</label>
        <input type="number" id="vatNo" name="organizationVatNumber" class="input_label"required>

        <label for="panNo" class="label">PAN Number:</label>
        <input type="number" id="panNo" name="organizationPanNumber"class="input_label" required>

        <button type="submit" class="submit_button">Submit</button>
    </form>

</body>

</html>
