<html>
<body>
    <form method="POST" action="{{ route('profile_pic_complete') }}" enctype="multipart/form-data">
        <!-- Form Encapsulation requerd for uploading files -->
        @csrf
        <div class="phoneNumber" >
            <label for="phone">Phone Number:</label><br>
            <input type="text" name="phone" id="phone" class="ph">
            @error('phone')
            <span class="text-danger">{{ $message }}</span>
            @enderror<br><br>
        </div>
        <div class="photo">
            <label for="photo">Upload Photo:</label><br>
            <input type="file" name="photo" id="photo" class="pic">
            @error('photo')
            <span class="text-danger">{{ $message }}</span>
            @enderror<br><br>
        </div>
        <button type="submit" class="btn btn-primary">Save Profile</button>
    </form>
</body>
</html>