<x-app-layout>
    


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if(session()->has('message'))
                <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                    <span class="font-medium">Success!</span>     {{ session()->get('message') }}.
                </div>
                
            @endif
            <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-5 py-1 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
                Quotation
            </span>
            <div class="w-full mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                
                <h5 class="mb-2 text-center text-3xl font-bold text-gray-900 dark:text-white">Cost Calculator</h5>

                <hr style="margin-bottom:30px;border: 2px sold white">

                <form class="max-w-lg ml-auto mt-5" action="{{ route('quotationsUser') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    
                    <div class="mt-5" id="invoiceForm">
                        <div class="grid md:grid-cols-1 md:gap-12">
                            <div class="grid md:grid-cols-4 md:gap-3">
                                <div class="relative z-0 w-full  group">
                                    <input type="text" name="userName" id="userName" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                    <label for="user" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">User</label>
                                </div>
                                
                                <div class="relative z-0 w-full  group">
                                    <input type="text" name="address" id="address" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                    <label for="address" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Address</label>
                                </div>
                                

                                <div class="relative z-0 w-full  group">
                                    <input type="text" name="clientName" id="clientName" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                    <label for="clientName" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Client Name</label>
                                </div>
                                
                                <div class="relative z-0 w-full  group">                                    
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload Logo</label>
                                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_logo" name="logo" type="file">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF.</p>
                                </div>
                                
                            </div>                            
                        </div>
                        <button id="qutSub" type="" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ">Submit</button>
                    </div>
                </form>
            </div>

            <div id="invoiceData" class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <hr style="margin-top:20px;border: 1px solid white">

                <h5 class="mb-2 text-center text-3xl font-bold text-gray-900 dark:text-white">Coyle Environmental and Sewage Systems</h5>
                
                
                <div class="text-xl font-bold text-gray-900 dark:text-white max-w-4xl p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">    
                        
                        <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
                            <li class="pb-3 sm:pb-4">
                                <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                    <div class="flex-shrink-0">
                                        <img id="logoSrc" class="w-16 h-16 rounded-full" src="" alt="Logo">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p id="name" class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            
                                        </p>
                                        <p id="addressShow" class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            
                                        </p>
                                    </div>
                                    <div id="clientShow" class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        
                                    </div>
                                </div>
                            </li>   
                        </ul>

                    </div>
                    

                <div class="max-w-4xl mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <h5 class="mb-2 text-center text-xl font-bold text-gray-900 dark:text-white">All Products</h5>
                                                           
                    <div class="overflow-x-auto mb-5">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Material
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Description
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Qty
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Unit
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Rate
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Price
                                    </th>                                    
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">

                                
                                
                            </tbody>
                        </table>
                    </div> 
                    <div class="overflow-x-auto mt-5">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Cost
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Amount
                                    </th>                                    
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tableBody1">

                                
                                
                            </tbody>
                        </table>
                    </div> 

                       

                </div>

                <form class="max-w-lg ml-auto mt-5" action="{{ route('quotations.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                        <input type="hidden" id="dataProducts" name="dataProducts" >
                        <input type="hidden" id="dataCosts" name="dataCosts" >
                        <input type="hidden" id="invoiceUserName" name="user" >
                        <input type="hidden" id="invoiceAddress" name="address" >
                        <input type="hidden" id="invoiceClientName" name="client" >
                        <input type="hidden" id="invoiceLogo" name="logo" >
                        
                        <button id="sub" style="display:none;" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ">Submit</button>

                    </form>
                    
                <form id="add-prod" class="mt-5">
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-5 group">
                            <!-- <input type="text" name="description" id="description" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="description" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Product Description</label> -->
                            <select id="description" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose a Product</option>
                                @if ($products->count() > 0)
                                    @foreach ($products as $prd)
                                        <option value="{{$prd->description.','.$prd->unit.','.$prd->netRate}}">{{$prd->description}}</option>
                                    @endforeach                    
                                @endif
                            </select>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <div class="grid md:grid-cols-4 md:gap-3">
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="number" name="qty" id="qty" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                    <label for="qty" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Quantity</label>
                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="number" readonly name="rate" id="rate" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                    <label for="rate" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Rate</label>
                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text" readonly name="unit" id="unit" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                    <label for="unit" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Unit</label>
                                </div>
                                
                                <div class="relative z-0 w-full mb-5 group">
                                    <button type="button" id="addButton" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
                    
                <form id="add-prod" class="mt-5">
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-5 group">                                
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-5 py-1 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
                                Additional Costs
                            </span>
        
                            <select id="costs" name="costs" class="bg-gray-50 mt-5 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose a Cost</option>
                                @foreach ($costs as $c)
                                        <option value="{{$c}}">{{$c}}</option>
                                @endforeach                                                        
                            </select>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <div class="grid md:grid-cols-2 mt-5 md:gap-6">
                                <div class="relative z-0 w-full mt-5 mb-5 group">
                                    <input type="number" name="amount" id="amount" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                    <label for="amount" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Amount</label>
                                </div>
                                
                                <div class="relative z-0 w-full mb-5 mt-5 group">
                                    <button type="button" id="addButtonCost" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script>

    var path = "{{ route('autocomplete') }}";

    $('input.typeahead').typeahead({

        source:  function (query, process) {
            

        return $.get(path, { query: query }, function (data) {
            console.log(data);
                return process(data);

            });

        }

    });

    $(document).ready(function(){
        $("#invoiceData").hide();
        $("#logoView").hide();            
       
        $("#existing").change(function(){
            $("#choiceExisting").show();
            $("#choiceNew").hide();
        });

        $("#address").change(function(){
            $('#addressShow').html(this.value);
        });

        $("#clientName").change(function(){
            $('#clientShow').html(this.value);
        });
                

        let file;
        $("#file_logo").change(function(){
            file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function (event) {
                    $("#logoSrc").attr("src", event.target.result);
                    $("#formLogo").attr("src", event.target.result);
                };
                reader.readAsDataURL(file);
                $("#logoView").show();            
            }
            else
            {
                $("#logoView").hide();            
            }
            
        });
       
        $("#qutSub").click(function(){
            var name = $("#userName").val();
            var address = $("#address").val();
            var client =  $("#clientName").val();
            // $("#formLogo").attr("src", file);

            $("#invoiceForm").hide();
            $('#name').html(name);
            $("#invoiceData").show();            
            
        });

        $('#description').on('change', function() {
            
                $('#unit').val(this.value.split(',')[1]);
                $('#rate').val(this.value.split(',')[2]);
                
            });

    });


    let data = []
    let i = 0;
    // Get form and table elements
    
    const tableBody = document.getElementById('tableBody');
    const addButton = document.getElementById('addButton');

    // Add event listener to add button
    addButton.addEventListener('click', addRow);

    // Function to add row to table
    function addRow() {
    const description = document.getElementById('description').value.split(',')[0];
    const qty = document.getElementById('qty').value;
    const unit = document.getElementById('unit').value;
    const rate = document.getElementById('rate').value;


    const price = rate * qty;
    
    let d = {description: description, qty: qty, unit: unit, rate: rate, price: price};
    data.push(d);
    // Create new table row
        const row = document.createElement('tr');
        row.classList.add("bg-white", "border-b", "dark:bg-gray-800", "dark:border-gray-700");
        row.id = i;
        // Create table cells
        const materialCell = document.createElement('td');
        materialCell.textContent = '';
        materialCell.classList.add("px-6", "py-4");


        const descriptionCell = document.createElement('td');
        descriptionCell.textContent = description;
        descriptionCell.classList.add("px-6", "py-4");
        
        const qtyCell = document.createElement('td');
        qtyCell.textContent = qty;
        qtyCell.classList.add("px-6", "py-4");

        const unitCell = document.createElement('td');
        unitCell.textContent = unit;
        unitCell.classList.add("px-6", "py-4");

        const rateCell = document.createElement('td');
        rateCell.textContent = rate;
        rateCell.classList.add("px-6", "py-4");

        const priceCell = document.createElement('td');
        priceCell.textContent = price;
        priceCell.classList.add("px-6", "py-4");

        const actionCell = document.createElement('td');
        actionCell.classList.add("px-6", "py-4");

        const removeButton = document.createElement('button');
        removeButton.classList.add("text-white", "bg-blue-700", "hover:bg-blue-800", "focus:ring-4", "focus:outline-none", "focus:ring-blue-300", "font-medium", "rounded-lg", "text-sm", "p-2.5", "text-center", "inline-flex", "items-center", "me-2", "dark:bg-blue-600", "dark:hover:bg-blue-700", "dark:focus:ring-blue-800");
        removeButton.textContent = 'Remove';
        removeButton.addEventListener('click', removeRow);
        actionCell.appendChild(removeButton);

        // Add cells to row
        row.appendChild(materialCell);
        row.appendChild(descriptionCell);
        row.appendChild(qtyCell);
        row.appendChild(unitCell);
        row.appendChild(rateCell);
        row.appendChild(priceCell);
    
        row.appendChild(actionCell);

    // Add row to table body
    tableBody.appendChild(row);

    // Clear form fields
    document.getElementById('description').value = '';
    document.getElementById('qty').value = '';
    document.getElementById('unit').value = '';
    document.getElementById('rate').value = '';
    console.log(data);
    document.getElementById('dataProducts').value = JSON.stringify(data);
    document.getElementById('invoiceUserName').value = document.getElementById('userName').value;
    document.getElementById('invoiceAddress').value = document.getElementById('address').value;
    document.getElementById('invoiceClientName').value = document.getElementById('clientName').value;
    document.getElementById('invoiceLogo').value = document.getElementById('file_logo').value;
    
    i++
    if(i > 0)
    {
        document.getElementById('sub').setAttribute('style', 'display:block;');
    }
    else 
    {
        document.getElementById('sub').setAttribute('style', 'display:none;');
    }
    }

    // Function to remove row from table
    function removeRow(event) {
        i--;
        const row = event.target.parentNode.parentNode;
        tableBody.removeChild(row);
        
        delete data[event.target.parentNode.parentNode.id];
        
        document.getElementById('dataProducts').value = JSON.stringify(data);
        document.getElementById('invoiceUserName').value = document.getElementById('userName').value;
        document.getElementById('invoiceAddress').value = document.getElementById('address').value;
        document.getElementById('invoiceClientName').value = document.getElementById('clientName').value;
        document.getElementById('invoiceLogo').value = document.getElementById('file_logo').value;
    

        if(i > 0)
        {
            document.getElementById('sub').setAttribute('style', 'display:block;');
        }
        else 
        {
            document.getElementById('sub').setAttribute('style', 'display:none;');
        }
    }

    let data1 = []
    let i1 = 0;
    const tableBody1 = document.getElementById('tableBody1');
    const addButton1 = document.getElementById('addButtonCost');

    // Add event listener to add button
    addButton1.addEventListener('click', addRow1);

    // Function to add row to table
    function addRow1() {
    const costs = document.getElementById('costs').value;
    const amount = document.getElementById('amount').value;
    
    let d = {costs: costs, amount: amount};
    data1.push(d);
    // Create new table row
        const row = document.createElement('tr');
        row.classList.add("bg-white", "border-b", "dark:bg-gray-800", "dark:border-gray-700");
        row.id = i;
        // Create table cells
        const costCell = document.createElement('td');
        costCell.textContent = costs;
        costCell.classList.add("px-6", "py-4");


        const amountCell = document.createElement('td');
        amountCell.textContent = amount;
        amountCell.classList.add("px-6", "py-4");
        
        const actionCell = document.createElement('td');
        actionCell.classList.add("px-6", "py-4");

        const removeButton = document.createElement('button');
        removeButton.classList.add("text-white", "bg-blue-700", "hover:bg-blue-800", "focus:ring-4", "focus:outline-none", "focus:ring-blue-300", "font-medium", "rounded-lg", "text-sm", "p-2.5", "text-center", "inline-flex", "items-center", "me-2", "dark:bg-blue-600", "dark:hover:bg-blue-700", "dark:focus:ring-blue-800");
        removeButton.textContent = 'Remove';
        removeButton.addEventListener('click', removeRow1);
        actionCell.appendChild(removeButton);

        // Add cells to row
        row.appendChild(costCell);
        row.appendChild(amountCell);
        
        row.appendChild(actionCell);

    // Add row to table body
    tableBody1.appendChild(row);

    // Clear form fields
    document.getElementById('costs').value = '';
    document.getElementById('amount').value = '';
        document.getElementById('dataCosts').value = JSON.stringify(data1);
        document.getElementById('invoiceUserName').value = document.getElementById('userName').value;
        document.getElementById('invoiceAddress').value = document.getElementById('address').value;
        document.getElementById('invoiceClientName').value = document.getElementById('clientName').value;
        document.getElementById('invoiceLogo').value = document.getElementById('file_logo').value;
        
    }

    // Function to remove row from table
    function removeRow1(event) {
        i1--;
    const row = event.target.parentNode.parentNode;
    tableBody1.removeChild(row);
    
    delete data1[event.target.parentNode.parentNode.id];
    
    document.getElementById('dataCosts').value = JSON.stringify(data1);  
    document.getElementById('invoiceUserName').value = document.getElementById('userName').value;
    document.getElementById('invoiceAddress').value = document.getElementById('address').value;
    document.getElementById('invoiceClientName').value = document.getElementById('clientName').value;
    document.getElementById('invoiceLogo').value = document.getElementById('file_logo').value;
    
    }
    
</script>