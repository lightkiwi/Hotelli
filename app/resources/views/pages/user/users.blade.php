@extends('layouts.default')

@section('title', 'Users')

@section('content')
    <h1>users index</h1>

    <div class="flex-center position-ref full-height">
        <div class="content">
            <h1>Here's a list of available products</h1>
            <table>
                <thead>
                <td>first_name</td>
                <td>last_name</td>
                <td>email</td>
                <td>phone</td>
                <td>password</td>
                <td>id_address</td>
                <td>id_profil</td>
                <td>id_gender</td>
                <td>rgpd_date</td>
                <td>newsletter</td>
                <td>ip_address</td>
                <td>user_agent</td>
                </thead>
                <tbody>
                @foreach ($allUsers as $user)
                    <tr>
                        <td>{{ $user->first_name }}</td>
                        <td class="inner-table">{{ $user->last_name }}</td>
                        <td class="inner-table">{{ $user->email }}</td>
                        <td class="inner-table">{{ $user->phone }}</td>
                        <td class="inner-table">{{ $user->password }}</td>
                        <td class="inner-table">{{ $user->id_address }}</td>
                        <td class="inner-table">{{ $user->id_profil }}</td>
                        <td class="inner-table">{{ $user->id_gender }}</td>
                        <td class="inner-table">{{ $user->rgpd_date }}</td>
                        <td class="inner-table">{{ $user->newsletter }}</td>
                        <td class="inner-table">{{ $user->ip_address }}</td>
                        <td class="inner-table">{{ $user->user_agent }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
