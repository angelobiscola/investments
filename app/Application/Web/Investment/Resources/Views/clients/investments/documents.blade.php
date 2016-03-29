<style>
    .page-break {
        page-break-after: always;
    }
</style>

    @include('investment::reports.prospecto',['investment' => $investment])

<div class="page-break"></div>

    @include('investment::reports.adesao')

<div class="page-break"></div>

    @include('investment::reports.promissoria',['investment' => $investment])






