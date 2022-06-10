<x-app-layout>
    <div>
        <div class="bg-gray-200 min-h-screen pt-4">
            <div class="container mx-auto">
                <div class="inputs w-full max-w-2xl p-6 mx-auto">
                    <h2 class="text-2xl text-gray-900">Rent Invoice</h2>
                    <div class='flex flex-wrap -mx-3 my-6'>
                        <div class="personal w-full border-t border-gray-400 pt-4">
                            <h2 class="text-2xl text-gray-900">Billing info:</h2>
                            <div class="flex items-center justify-between mt-4">
                                <div class='w-full  px-3 mb-6'>
                                    <label
                                        class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Name</label>
                                    <input
                                        class='appearance-none block w-full text-gray-700 border-0 border-b-2 bg-transparent border-gray-400  py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                                        id="name" name="name" disabled type='text' value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class='w-full px-3 mb-6'>
                                    <label
                                        class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Phone
                                        Number</label>
                                    <input
                                        class='appearance-none block w-full text-gray-700 border-0 border-b-2 bg-transparent border-gray-400  py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                                        type='text' id="phone" name="phone" disabled value="{{ $profile->phone }}">
                                </div>
                            </div>
                            <div class='w-full md:w-full px-3 mb-6'>
                                <label
                                    class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Address</label>
                                <input
                                    class='appearance-none block w-full text-gray-700 border-0 border-b-2 bg-transparent border-gray-400  py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                                    type='text' id='address' name="address" disabled value="{{ $profile->address }}">
                            </div>
                            <div class='w-full md:w-full px-3 mb-6'>
                                <label
                                    class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>City</label>
                                <input
                                    class='appearance-none block w-full text-gray-700 border-0 border-b-2 bg-transparent border-gray-400  py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                                    id='grid-text-1' type='text' id='city' name="city" disabled value="{{ $profile->city }}">
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('orders.update') }}" class="mt-6"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class='flex flex-wrap -mx-3 mb-6'>
                            <input type="hidden" name="id" id="id" value="{{ $order->id }}">
                            <div class="personal w-full border-t border-gray-400 pt-4">
                                <h2 class="text-2xl text-gray-900">Order details:</h2>
                                <div class="flex items-center justify-between mt-4">
                                    <div class='w-full  px-3 mb-6'>
                                        <label
                                            class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Building</label>
                                        <input
                                            class='appearance-none block w-full text-gray-700 border-0 border-b-2 bg-transparent border-gray-400  py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                                            id="name" name="name" disabled type='text' value="{{ $order->building->name }}">
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class='w-full px-3 mb-6'>
                                        <label
                                            class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>
                                            Payment Due
                                        </label>
                                        <div
                                            class='appearance-none block w-full text-gray-700 border-0 border-b-2 bg-transparent border-gray-400  py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'>
                                            Rp.{{ number_format($order->total_price,2,",",".") }}
                                        </div>
                                    </div>
                                </div>
                                <div class='w-full md:w-full px-3 mb-6 '>
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Proof of Payment</label>
                                    <button class="appearance-none bg-gray-200 text-gray-900 px-2 py-1 shadow-sm border border-gray-400 rounded-md "><input id="proof_of_payment" name="proof_of_payment" type="file"></button>
                                </div>
                                <div class="flex flex-row justify-end">
                                    <button
                                        class="appearance-none bg-gray-200 text-gray-900 px-2 py-1 shadow-sm border border-gray-400 rounded-md mr-3"
                                        type="submit">Proceed</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
