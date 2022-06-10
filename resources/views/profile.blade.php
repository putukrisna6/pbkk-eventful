<x-app-layout>
   <div>
        <div class="bg-gray-200 min-h-screen pt-2 my-16">
            <div class="container mx-auto">
                <div class="inputs w-full max-w-2xl p-6 mx-auto">
                    <h2 class="text-2xl text-gray-900">My Account</h2>
                    <form action="{{ route('tenant.profile.update') }}" class="mt-6 border-t border-gray-400 pt-4"  method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class='flex flex-wrap -mx-3 mb-6'>
                            <div class="flex flex-row">
                                <img src="img/profile.png" alt="" srcset="" class="h-20 w-20 ml-2 mt-4 mb-8">
                                <div class="flex flex-col mt-4 ml-8">
                                    <p class="font-bold text-xl">{{$user->name}}</p>
                                    <p>{{$user->email}}</p>
                                </div>
                            </div>
                            <div class="flex items-center mt-4">
                                <div class='w-full md:w-full px-3 mb-6 '>
                                    <!-- <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Profile picture</label> -->
                                    <button class="appearance-none bg-gray-200 text-gray-900 px-2 py-1 shadow-sm border border-gray-400 rounded-md ">Change your profile picture</button>
                                </div>
                            </div>
                            <div class='w-full md:w-full px-3 mb-6 '>
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Password</label>
                                    <button class="appearance-none bg-gray-200 text-gray-900 px-2 py-1 shadow-sm border border-gray-400 rounded-md ">Change your password</button>
                                </div>
                            <div class="personal w-full border-t border-gray-400 pt-4">
                                <h2 class="text-2xl text-gray-900">Personal info:</h2>
                                <div class="flex items-center justify-between mt-4">
                                    <div class='w-full md:w-1/2 px-3 mb-6'>
                                        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' >Name</label>
                                        <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id="name" name="name" type='text' value="{{ $user->name }}" required>
                                    </div>
                                    <div class='w-full md:w-1/2 px-3 mb-6'>
                                        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' >Gender</label>
                                        <div class="flex-shrink w-full inline-block relative">
                                            <select class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded " id="gender" name="gender" require>
                                                <option {{$profile->gender == "Man" ? 'selected' : ''}}>Man</option>
                                                <option {{$profile->gender == "Woman"  ? 'selected' : ''}}>Woman</option>
                                            </select>
                                            <div class="pointer-events-none absolute top-0 mt-3  right-0 flex items-center px-2 text-gray-600">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class='w-full md:w-1/2 px-3 mb-6'>
                                        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' >Phone Number</label>
                                        <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' type='text' id="phone" name="phone" value="{{ $profile->phone }}" required>
                                    </div>
                                    <div class='w-full md:w-1/2 px-3 mb-6'>
                                        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' >Birthday Date</label>
                                        <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='date' name="date" type='date' placeholder='Enter birthday date' value="{{$profile->birthday}}" required>
                                    </div>
                                </div>
                                <div class='w-full md:w-full px-3 mb-6'>
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Address</label>
                                    <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' type='text' id='address' name="address" placeholder='Enter address' required>
                                </div>
                                <div class='w-full md:w-full px-3 mb-6'>
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>City</label>
                                    <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='grid-text-1' type='text' id='city' name="city" placeholder='Enter city' value="{{ $profile->city }}" required>
                                </div>
                                <div class="flex flex-row justify-end">
                                <button class="appearance-none bg-gray-200 text-gray-900 px-2 py-1 shadow-sm border border-gray-400 rounded-md mr-3" type="submit">Return</button>
                                    <button class="appearance-none bg-gray-200 text-gray-900 px-2 py-1 shadow-sm border border-gray-400 rounded-md mr-3" type="submit">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   </div>
</x-app-layout>
