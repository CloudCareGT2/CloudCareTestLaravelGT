@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="fixed-header">
            <div class="pagination justify-content-center">
                <h1>Elenco delle Birre</h1>
            </div>
            <div class="pagination justify-content-center">
                {{ $response->onEachSide(1)->links() }}
            </div>
        </div>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Tagline</th>
                        <th>Immagine</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($response as $beer)
                        <tr>
                            <td>{{ $beer['id'] }}</td>
                            <td>{{ $beer['name'] }}</td>
                            <td>{{ $beer['tagline'] }}</td>
                            <td><img src="{{ $beer['image_url'] }}" alt="{{ $beer['name'] }}" width="100"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="fixed-footer">
            <div class="pagination justify-content-center">
                {{ $response->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
@endsection

