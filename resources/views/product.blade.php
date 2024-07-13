{{-- <div class="container-fluid my-5">
    <h2 class="text-center mb-4">Our Hotel Rooms</h2>
    <div class="owl-carousel owl-theme">
        @php
        $rooms = [
            ['name' => 'Deluxe Room', 'description' => 'Spacious room with king-sized bed', 'price' => '$120/night', 'image' => 'https://t3.ftcdn.net/jpg/02/71/08/28/360_F_271082810_CtbTjpnOU3vx43ngAKqpCPUBx25udBrg.jpg'],
            ['name' => 'Suite', 'description' => 'Luxurious suite with ocean view', 'price' => '$250/night', 'image' => 'https://images.pexels.com/photos/1457842/pexels-photo-1457842.jpeg'],
            ['name' => 'Standard Room', 'description' => 'Comfortable room with queen-sized bed', 'price' => '$80/night', 'image' => 'https://images.pexels.com/photos/271624/pexels-photo-271624.jpeg'],
            ['name' => 'Family Room', 'description' => 'Large room with multiple beds', 'price' => '$150/night', 'image' => 'https://images.pexels.com/photos/1643383/pexels-photo-1643383.jpeg'],
            ['name' => 'Single Room', 'description' => 'Cozy room for one', 'price' => '$60/night', 'image' => 'https://images.pexels.com/photos/667838/pexels-photo-667838.jpeg'],
            ['name' => 'Presidential Suite', 'description' => 'Opulent suite with exclusive amenities', 'price' => '$500/night', 'image' => 'https://images.pexels.com/photos/259962/pexels-photo-259962.jpeg'],
            // Add more rooms here as needed
        ];
        @endphp

        @foreach ($rooms as $room)
        <div class="item">
            <div class="card service-card">
                <div class="image-wrapper">
                    <img src="{{ $room['image'] }}" class="card-img-top" alt="{{ $room['name'] }}">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $room['name'] }}</h5>
                    <p class="card-text">{{ $room['description'] }}</p>
                    <p class="card-text"><strong>{{ $room['price'] }}</strong></p>
                    <a href="#" class="btn btn-primary">Enquire Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div> --}}

<div class="container-fluid my-5">
    <h2 class="text-center mb-4">Our Hotel Rooms</h2>
    <div class="owl-carousel owl-theme">
        @foreach ($rooms as $room)
        <div class="item">
            <div class="card service-card">
                {{-- <div class="image-wrapper">
                    <img src="{{ Storage::url($room->images->first()->image_path) }}" class="card-img-top" alt="{{ $room->name }}">
                </div> --}}
                @if($room->images->isNotEmpty())
                <img src="{{ Storage::url($room->images->first()->image_path) }}" class="card-img-top" alt="{{ $room->name }}">
                @else
                    <img src="{{ asset('default-image-url.jpg') }}" class="card-img-top" alt="{{ $room->name }}"> <!-- Provide a default image path -->
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $room->name }}</h5>
                    <p class="card-text">{{ $room->roomType->description }}</p>
                    <p class="card-text"><strong>{{ $room->roomType->price_per_night }}</strong></p>
                    @if ($room->is_available_today)
                        <p class="card-text text-success">Available Today</p>
                    @else
                        <p class="card-text text-danger">Not Available Today</p>
                    @endif
                    <a href="#" class="btn btn-primary">Enquire Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
