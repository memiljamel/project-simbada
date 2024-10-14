<style>
    * {
        margin: 0;
    }

    header {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 8px;
        width: 100%;
        height: auto;
        padding: 0 16px;
        margin: 0;
        font-size: 14px;
        color: rgba(0, 0, 0, 0.87);
    }
</style>

<header>
    @if($status->value === App\Enums\StatusTypeEnum::Active->value)
        <h2>{{ __('Active Asset') }}</h2>
        <div><b>{{ __('PT. XYZ') }}</b></div>
        <div><b>{{ __('Date: ') . now()->toDateString() }}</b></div>
        <div>{{ __('Category: All, Brand: All, Distributor: All, Responsible Person: All, Location: All') }}</div>
    @else
        <h2>{{ __('Non Active Asset') }}</h2>
        <div><b>{{ __('PT. XYZ') }}</b></div>
        <div><b>{{ __('Date: ') . now()->toDateString() }}</b></div>
        <div>{{ __('Category: All, Brand: All, Distributor: All, Responsible Person: All, Location: All') }}</div>
    @endif
</header>
