@extends("layouts.app")

@section("title")
  {{ $car['name'] }}
@endsection

@section("content")
  <div class="w-full max-w-[1440px] p-4">
    <h1 class="mb-8 text-3xl font-bold text-center">{{ $car['name'] }} Details</h1>
    <div class="mx-auto w-full max-w-[780px] flex justify-center">
      <div class="w-[50%]">
        <img src="{{ $car['image'] }}" alt="{{ $car['name'] }}">
      </div>
      <div class="w-[50%] flex flex-col gap-4">
        <p class="font-bold">{{ $car['name'] }} ({{ $car['year'] }})</p>
        <p>Rp. {{ number_format($car['price'], 0, ',', '.') }}/day</p>
        <p id="car-price" class="hidden">{{ $car['price'] }}</p>
        <p class="text-justify">{{ $car['description'] }}</p>
        <form action=" {{ route('transaction-store', $car['id']) }}" method="POST" class="flex flex-col gap-2">
          @csrf
          <div class="flex flex-col gap-1">
            <label for="start">Start Date</label>
            <input type="date" name="start" id="start" class="input w-full p-1 rounded-md focus:outline-2 focus:outline-erentGreen" required>
          </div>
          <div class="flex flex-col gap-1">
            <label for="return">Return Date</label>
            <input type="date" name="return" id="return" class="input w-full p-1 rounded-md focus:outline-2 focus:outline-erentGreen" required>
            <p id="invalid-date-input" class="text-erentRed hidden">Start or Return date cannot set to yesterday or before. And return date cannot set to before start date.</p>
            <input type="number" name="id" id="id" value="{{ $car['id'] }}" required class="hidden">
            <input type="text" name="name" id="name" value="{{ $car['name'] }}" required class="hidden">
            <input type="text" name="image" id="image" value="{{ $car['image'] }}" required class="hidden">
            <input type="number" name="price" id="price" value="{{ $car['price'] }}" required class="hidden">
            <input type="number" name="renter_id" id="renter_id" value="{{ session()->get('id') }}" required class="hidden">
          </div>
          <div>
            <p class="mt-4 font-bold text-xl">Total price: <span id="total-price">0</span></p>
          </div>
          <div>
            @if(session()->get('role_id') == 1)
                <a href="/edit/{{ $car['id'] }}">
                    <button class="w-full mt-4 bg-erentYellow active:bg-erentYellow/15 transition duration-100 ease-in-out text-black px-4 py-2 rounded-md hover:bg-white hover:outline hover:outline-erentYellow">Edit Car</button>
                </a>
                @if($car["isAvailable"])
                    <a href="/delete/{{ $car['id'] }}">
                        <button class="w-full mt-4 bg-erentRed active:bg-erentRed/15 transition duration-100 ease-in-out text-white px-4 py-2 rounded-md hover:bg-white hover:text-erentRed hover:outline hover:outline-erentRed">Delete Car</button>
                    </a>
                @endif
            @endif
            @if ($car['isAvailable'])
              <button type="submit" id="rent" class="w-full mt-4 bg-erentGreen active:bg-erentGreen/15 transition duration-100 ease-in-out text-white px-4 py-2 rounded-md hover:bg-white hover:text-erentGreen hover:outline hover:outline-erentGreen">Rent</button>
            @else
              <p class="text-red-700 mb-[-15px]">&#10006; This car is being rented</p>
              <button type="submit" disabled class="cursor-not-allowed w-full mt-4 text-black/80 px-4 py-2 rounded-md bg-slate-300">Rent</button>
            @endif
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection