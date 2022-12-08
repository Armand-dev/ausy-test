<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            @if (\Session::has('success'))
                <div class="alert alert-success p-6 mt-4">
                    <ul>
                        <li>{{\Session::get('success')}}</li>
                    </ul>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Employee</th>
                            <th>Email</th>
                            <th>Plus one</th>
                            <th>Kids</th>
                            <th>Vegeterians</th>
                            <th>Department</th>
                            <th>Total persons</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($registrations as $registration)
                            <tr>
                                <td>{{ $registration->id }}</td>
                                <td>{{ $registration->employee_name }}</td>
                                <td>{{ $registration->email }}</td>
                                <td>{{ $registration->plus_one ? 'Yes' : 'No' }}</td>
                                <td>{{ $registration->kids }}</td>
                                <td>{{ $registration->vegeterians }}</td>
                                <td>{{ $registration->department }}</td>
                                <td>{{ 1 + $registration->plus_one + $registration->kids }}</td>
                                <td>
                                    <button class="btn btn-danger  " data-toggle="modal" data-target="#my-modal">Delete</button>
                                    <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content border-0">
                                                <div class="modal-body p-0">
                                                    <div class="card border-0 p-sm-3 p-2 justify-content-center">
                                                        <div class="card-header pb-0 bg-white border-0 ">
                                                            <div class="row"><div class="col ml-auto">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <p class="font-weight-bold mb-2"> Are you sure you want to delete this?</p>
                                                        </div>
                                                        <div class="card-body px-sm-4 mb-2 pt-1 pb-0">
                                                            <div class="row justify-content-end no-gutters">
                                                                <div class="col-auto">
                                                                    <button type="button" class="btn btn-light text-muted" data-dismiss="modal">
                                                                        Cancel
                                                                    </button>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <form method="POST" action="/registration/{{ $registration->id }}">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-danger px-4"style="background: #dc3545 !important;">
                                                                            Delete
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.6.1.slim.js"
        integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk="
        crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
</x-app-layout>
