@extends('layout.new')
@section('contents')
    <div class="row">

        @include('flash.flash')
        <legend>Booked Properties</legend>
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Property</th>
                                <th>Check In Date</th>
                                <th>Check Out Date</th>
                                <th>Guests</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($propertiesbooked as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->full_name ?? '' }}</td>
                                    <td>{{ $item->email ?? '' }}</td>
                                    <td>{{ $item->property->name ?? '' }}</td>
                                    <td>{{ $item->check_in ?? '' }}</td>
                                    <td>{{ $item->check_out ?? '' }}</td>
                                    <td>{{ $item->guests ?? '' }}</td>
                                    <td>{{ $item->amount ?? '' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No data</td>
                                </tr>
                            @endforelse
                        </tbody>
                        {{-- pagination with count --}}
                        <tfoot>
                            <tr>
                                <td colspan="5">
                                    {{ $propertiesbooked->links() }}
                                    <span class="float-right">Showing {{ $propertiesbooked->firstItem() }} to
                                        {{ $propertiesbooked->lastItem() }}
                                        of {{ $propertiesbooked->total() }} entries</span>
                                </td>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
