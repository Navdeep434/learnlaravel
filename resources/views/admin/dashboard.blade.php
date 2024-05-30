@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">{{ __('Welcome') }}</div>
                    <div class="card-header text-center">
                        {{-- @dd(auth('admin')) --}}
                        <p>Welcome to our application, {{ $adminData->firstname }}!</p>
                        <p>This is your dashboard.</p>
                    </div>
                        
                    <div class="card-body">
                        <div class="row m-3">
                            <div class="col text-end">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addRequestModal">
                                    Add Request
                                </button>                        
                            </div>
                        </div>
                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Item Requested Type</th>
                                    <th>Item Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach($items as $item) --}}
                                <tr>
                                    <td>{{-- {{ $item->user->name }} --}}</td>
                                    <td>{{-- {{ $item->requested_type }} --}}</td>
                                    <td>{{-- {{ $item->item_type }} --}}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Edit</a>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
<!-- Modal -->
<div class="modal fade" id="addRequestModal" tabindex="-1" role="dialog" aria-labelledby="addRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRequestModalLabel">Add Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addRequestForm">
                    @csrf 
                    <div class="col form-group">
                        <label for="requestText">User</label>
                        <input type="text" class="form-control" id="requestText" name="requestText">
                    </div>
                    <div class="form-group" id="requestTypesContainer">
                        <label for="requestType">Request Type</label>
                        <select class="form-control" id="requestType" name="requestType">
                            @foreach($itemTypes as $itemType)
                                <option data-check_item_type="{{ $itemType->item_type }}" value="{{ $itemType->Id }}">{{ $itemType->Item }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="addRequestTypeButton">Add Request Type</button>
                    </div>
                    <div id="additionalRequestTypes"></div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#addRequestTypeButton').click(function() {
    // Clone the requestType select element
    var selectHtml = $('#requestType').prop('outerHTML');
    
    // Create the remove button HTML
    var removeButtonHtml = '<button class="btn btn-danger removeRequestTypeButton">Remove</button>';
    
    // Create the container HTML with the select element and remove button
    var containerHtml = '<div class="requestTypeContainer">' + selectHtml + removeButtonHtml + '</div>';
    
    // Append the container HTML to the additionalRequestTypes element
    $('#additionalRequestTypes').append(containerHtml);
    });

    // Remove request type container when remove button is clicked
    $('#additionalRequestTypes').on('click', '.removeRequestTypeButton', function() {
        $(this).closest('.requestTypeContainer').remove();
    });

    // Handle form submission
    $('#addRequestForm').submit(function(event) {
        event.preventDefault(); // Prevent the default form submission
        
        var requestText = $('#requestText').val();
        var requestTypes = $('.additional-request-type');
        var requestTypeValues = requestTypes.map(function() {
        return $(this).find('select').val();
    }).get();

    // Send an AJAX request to save the data
    $.ajax({
        url: '/save-item',
        type: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: JSON.stringify({
            requestText: requestText,
            requestTypes: requestTypeValues
        }),
        dataType: 'json',
        success: function(data) {
            console.log(data.message);
            // Optionally, update the UI to reflect the successful save
        },
        error: function(xhr, status, error) {
            console.error('Error saving item:', error);
            // Optionally, display an error message to the user
        },
        complete: function() {
            // Close the modal
            $('#addRequestModal').modal('hide');
        }
    });
});

</script>


@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>