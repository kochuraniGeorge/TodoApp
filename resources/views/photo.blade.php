<html>
<body>
    <h1><u> Photos and Phone Number of {{auth()->user()->full_name}}</u></h1>
    <h3><u> Phone Number: </u>{{ $photoAndNumber->phone_number }}</h1>
    <ul> <u>Profile Picture</u><br> <img src="{{ $imageUrl}}" alt="My Profile Picture"></ul>

    <!-- this code also correct.<ul> <u>Profile Picture</u><br> <img src="{{ asset('storage/' . $photoAndNumber->profile_picture_data) }}" alt="My Profile Picture"></ul> -->
</body>
</html>