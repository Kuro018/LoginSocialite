@extends('layouts.app')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">OPS Monitoring</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <button type="button" class="btn btn-primary position-relative">
                SOP
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  99+
                  <span class="visually-hidden">unread messages</span>
                </span>
              </button>
            {{-- <a class="nav-link active" aria-current="page" href="#">SOP</a> --}}
          </li>
          <li class="nav-item">
            <button type="button" class="btn btn-primary position-relative">
                Documents
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  99+
                  <span class="visually-hidden">unread messages</span>
                </span>
              </button>
            {{-- <a class="nav-link" href="#">Documents</a> --}}
          </li>
          <li class="nav-item">
            <button type="button" class="btn btn-primary position-relative">
                Reports & Logs
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  99+
                  <span class="visually-hidden">unread messages</span>
                </span>
              </button>
            {{-- <a class="nav-link" href="#">Reports & Logs</a> --}}
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown link
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">


        </div>
        <div class="container mt-5">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="application-tab" data-bs-toggle="tab" data-bs-target="#application" type="button" role="tab" aria-controls="application" aria-selected="true">Application</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="servers-tab" data-bs-toggle="tab" data-bs-target="#servers" type="button" role="tab" aria-controls="servers" aria-selected="false">Servers</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="services&APIs-tab" data-bs-toggle="tab" data-bs-target="#services&APIs" type="button" role="tab" aria-controls="services&APIs" aria-selected="false">Services & APIs</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="sslcertificates-tab" data-bs-toggle="tab" data-bs-target="#sslcertificates" type="button" role="tab" aria-controls="sslcertificates" aria-selected="false">SSL Certificates</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="serverstorage-tab" data-bs-toggle="tab" data-bs-target="#serverstorage" type="button" role="tab" aria-controls="serverstorage" aria-selected="false">Server Storage</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="databasebackup-tab" data-bs-toggle="tab" data-bs-target="#databasebackup" type="button" role="tab" aria-controls="databasebackup" aria-selected="false">Database Backup</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="application" role="tabpanel" aria-labelledby="application-tab">
                    <div class="col mt 3">
                        <p>You im heeeeerre</p>
                    </div>

                </div>
                <div class="tab-pane fade" id="servers" role="tabpanel" aria-labelledby="servers-tab">...</div>
                <div class="tab-pane fade" id="services&APIs" role="tabpanel" aria-labelledby="services&APIs-tab">...</div>
                <div class="tab-pane fade" id="sslcertificates" role="tabpanel" aria-labelledby="sslcertificates-tab">...</div>
                <div class="tab-pane fade" id="serverstorage" role="tabpanel" aria-labelledby="serverstorage-tab">...</div>
                <div class="tab-pane fade" id="databasebackup" role="tabpanel" aria-labelledby="databasebackup-tab">...</div>
            </div>
        </div>

    </div>
</div>
@endsection
