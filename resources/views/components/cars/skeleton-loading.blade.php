<div id="skeletonLoading" class="hidden grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
  @for($i = 0; $i < 6; $i++)
    <div class="bg-white rounded-3xl shadow-lg border border-gray-100 overflow-hidden animate-pulse">
      <!-- Image Skeleton -->
      <div class="h-56 md:h-64 bg-gradient-to-br from-gray-200 to-gray-300"></div>

      <!-- Content Skeleton -->
      <div class="p-5 md:p-6">
        <!-- Title -->
        <div class="mb-4">
          <div class="h-6 bg-gray-200 rounded-lg mb-2 w-3/4"></div>
          <div class="h-4 bg-gray-200 rounded-lg w-1/4"></div>
        </div>

        <!-- Features -->
        <div class="grid grid-cols-3 gap-3 mb-5 pb-5 border-b border-gray-100">
          <div class="flex flex-col items-center p-3 bg-gray-50 rounded-xl">
            <div class="w-10 h-10 bg-gray-200 rounded-lg mb-2"></div>
            <div class="h-3 bg-gray-200 rounded w-12 mb-1"></div>
            <div class="h-4 bg-gray-200 rounded w-16"></div>
          </div>
          <div class="flex flex-col items-center p-3 bg-gray-50 rounded-xl">
            <div class="w-10 h-10 bg-gray-200 rounded-lg mb-2"></div>
            <div class="h-3 bg-gray-200 rounded w-12 mb-1"></div>
            <div class="h-4 bg-gray-200 rounded w-16"></div>
          </div>
          <div class="flex flex-col items-center p-3 bg-gray-50 rounded-xl">
            <div class="w-10 h-10 bg-gray-200 rounded-lg mb-2"></div>
            <div class="h-3 bg-gray-200 rounded w-12 mb-1"></div>
            <div class="h-4 bg-gray-200 rounded w-16"></div>
          </div>
        </div>

        <!-- Price -->
        <div class="grid grid-cols-2 gap-3 mb-5">
          <div class="bg-gray-100 rounded-2xl p-4 h-20"></div>
          <div class="bg-gray-100 rounded-2xl p-4 h-20"></div>
        </div>

        <!-- Button -->
        <div class="h-12 bg-gray-200 rounded-2xl"></div>
      </div>
    </div>
  @endfor
</div>