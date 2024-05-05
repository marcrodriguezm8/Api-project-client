<!-- Main modal -->
<div id={{$id}} tabindex="-1" aria-hidden="true" class="modal hidden overflow-y-auto overflow-x-hidden fixed flex justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            {{$slot}}
        </div>
    </div>
</div>
