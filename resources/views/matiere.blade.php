@extends('layouts.layout')

@section('title', 'Matieres')

@section('content')
<div class="container mt-3">
    <h1 class="text-center mb-4">Matieres</h1>

    <div class="mb-3">
        <a href="{{ route('matiere.create') }}" class="btn btn-primary">Insert Matiere</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>                
                <th>Code</th>
                <th>Libelle</th>
                <th>Coefficient</th>
                <th>Epreuves</th> 
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matieres as $matiere)
            <tr>
                <td>{{ $matiere->code }}</td>
                <td>{{ $matiere->libelle }}</td>
                <td>{{ $matiere->coef }}</td>
                <td>
                    @if($matiere->epreuves->isNotEmpty())
                        <ul>
                            @foreach($matiere->epreuves as $epreuve)
                                <li>{{ $epreuve->numero }}</li> 
                            @endforeach
                        </ul>
                    @else
                        <span>Aucune épreuve</span> 
                    @endif
                </td>
                <td>
                    <!-- Action Buttons -->
                    <button class="btn btn-info btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#showModal" 
                            data-id="{{ $matiere->id }}" 
                            data-code="{{ $matiere->code }}" 
                            data-libelle="{{ $matiere->libelle }}" 
                            data-coef="{{ $matiere->coef }}">
                        Show Info
                    </button>
                    <a href="{{ route('matiere.edit', $matiere->id) }}" class="btn btn-warning btn-sm">Update</a>
                    <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $matiere->id }})" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation">
            <div>
                {{ $matieres->links('pagination::bootstrap-4') }}  <!-- Use Bootstrap 4 pagination template -->
            </div>
        </nav>
    </div>
</div>

<!-- Modal for Showing Matiere Info -->
<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel">Matiere Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="matiere-details">
                    <p><strong>ID:</strong> <span id="matiere-id"></span></p>
                    <p><strong>Code:</strong> <span id="matiere-code"></span></p>
                    <p><strong>Libelle:</strong> <span id="matiere-libelle"></span></p>
                    <p><strong>Coefficient:</strong> <span id="matiere-coef"></span></p>
                    <p><strong>Created At:</strong> <span id="matiere-created_at"></span></p>
                    <p><strong>Updated At:</strong> <span id="matiere-updated_at"></span></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Deletion Confirmation -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this Matiere?
            </div>
            <div class="modal-footer">
                <form id="delete-form" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery and Bootstrap Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script to load Matiere details in the modal -->
<script>
    $(document).ready(function() {
        $('#showModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            $('#matiere-id').text(button.data('id'));
            $('#matiere-code').text(button.data('code'));
            $('#matiere-libelle').text(button.data('libelle'));
            $('#matiere-coef').text(button.data('coef'));
            $('#matiere-created_at').text(button.data('created_at'));
            $('#matiere-updated_at').text(button.data('updated_at'));
        });
    });

    // Function to set the action of the delete form in the modal
    function confirmDelete(matiereId) {
        var deleteForm = document.getElementById('delete-form');
        deleteForm.action = '/matiere/' + matiereId; // Set form action to the correct route
    }
</script>
@endsection
