@extends("layouts.app")

@section("title")
  Delete {{ $car['name'] }}
@endsection

@section("content")
  <section class="w-full max-w-[1440px] p-4">
    <div class="mx-auto w-full max-w-[780px] flex flex-col gap-4">
      <h1 class="text-3xl font-bold text-center">Are you sure want to delete {{ $car['name'] }}?</h1>
      <form action="" class="w-full flex justify-between gap-4">
        <a href="/" class="w-[50%]">
          <button type="button" class="w-full mt-4 bg-erentYellow active:bg-erentYellow/15 transition duration-100 ease-in-out text-black px-4 py-2 rounded-md hover:bg-white hover:outline hover:outline-erentYellow">
            Bact to home
          </button>
        </a>
        <button type="submit" class="w-[50%] mt-4 bg-erentGreen active:bg-erentGreen/15 transition duration-100 ease-in-out text-white px-4 py-2 rounded-md hover:bg-white hover:text-erentGreen hover:outline hover:outline-erentGreen">Yes</button>
      </form>
    </div>
  </section>
@endsection