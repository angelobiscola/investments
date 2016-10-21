<style>
    .page-break {
        page-break-after: always;
    }
</style>

    @include('investment::clients.reports.prospecto',['investment' => $investment])

<div class="page-break"></div>

    @include('investment::clients.reports.adesao')

<div class="page-break"></div>

    @include('investment::clients.reports.promissoria',['investment' => $investment])






