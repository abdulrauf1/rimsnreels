<x-app-layout>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if(session()->has('message'))
                <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                    <span class="font-medium">Success!</span>     {{ session()->get('message') }}.
                </div>
                
            @endif
            <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-5 py-1 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
                History
            </span>
            <div class="w-full mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                
                <h5 class="mb-2 text-center text-3xl font-bold text-gray-900 dark:text-white">Previous Quotations</h5>

                <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Sr. No.
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Invoice For
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Calculation File
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    
                                    <th scope="col" class="px-6 py-3">
                                        Date Added
                                    </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($quots as $k => $q)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                               {{$k+1}}
                                                                                                
                                            </th>
                                            <td class="px-6 py-4">
                                                {{$q->clientName}}
                                            </td>
                                            <td class="px-6 py-4">
                                                @if($q->pdfLink)
                                                    <a href="{{$q->pdfLink}}" target="_blank">View</a>
                                                @else
                                                    No File
                                                @endif
                                            </td>
                                            <td class="px-6 py-4">
                                                @if($q->visited)
                                                    <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-5 py-1 rounded dark:bg-white-700 dark:text-green-400 border border-blue-400">
                                                        visited
                                                    </span>         
                                                @else
                                                    <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-5 py-1 rounded dark:bg-white-700 dark:text-green-400 border border-blue-400">
                                                        Not visited
                                                    </span>         
                                                @endif
                                                
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$q->created_at}}
                                            </td>                                    
                                            
                                        </tr>
                                    @endforeach
                                
                                
                            </tbody>
                        </table>

                        
                    </div>                 

                    <nav aria-label="Page navigation example" class="mt-5 ms-auto">
                        <ul class="inline-flex -space-x-px text-sm ms-auto">
                            <p class="text-right">{{ $quots->links() }} </p>
                        </ul>
                    </nav>
            </div>

        </div>
    </div>
</x-app-layout>
