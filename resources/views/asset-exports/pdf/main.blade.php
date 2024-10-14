<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-transparent">
    <main class="block w-full max-w-full h-auto p-0 m-0 relative">
        <table class="table table-fixed w-full h-auto p-0 m-0 border-collapse border-spacing-0 break-words relative">
            <thead class="table-row-group">
                <tr class="table-row text-inherit align-middle outline-none relative">
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal" rowspan="2">
                        {{ __('#') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal" rowspan="2">
                        {{ __('Code') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal" rowspan="2">
                        {{ __('Name') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal" rowspan="2">
                        {{ __('Category') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal" colspan="6">
                        {{ __('Asset Detail') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal" colspan="6">
                        {{ __('Purchase') }}
                    </th>

                    @if ($status->value === App\Enums\StatusTypeEnum::Inactive->value)
                        <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal" colspan="3">
                            {{ __('Non Active') }}
                        </th>
                    @endif

                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal" colspan="7">
                        {{ __('Latest History') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal" rowspan="2">
                        {{ __('Notes') }}
                    </th>
                </tr>

                <tr class="table-row text-inherit align-middle outline-none relative">
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('Brand') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('Type') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('Manufacturer') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('Serial Number') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('Production Year') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('Description') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('Purchase Date') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('Distributor') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('Invoice Number') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('Qty') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('Unit Price') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('Total Price') }}
                    </th>

                    @if($status->value === App\Enums\StatusTypeEnum::Inactive->value)
                        <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                            {{ __('Date') }}
                        </th>
                        <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                            {{ __('Reason') }}
                        </th>
                        <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                            {{ __('Notes') }}
                        </th>
                    @endif

                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('Date From') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('Responsible Person') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('Location') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('Qty') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('Condition') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('Completeness') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('Notes') }}
                    </th>
                </tr>

                <tr class="table-row text-inherit align-middle outline-none relative">
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('1') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('2') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('3') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('4') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('5') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('6') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('7') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('8') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('9') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('10') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('11') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('12') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('13') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('14') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('15') }}
                    </th>
                    <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                        {{ __('16') }}
                    </th>

                    @if($status->value === App\Enums\StatusTypeEnum::Inactive->value)
                        <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                            {{ __('17') }}
                        </th>
                        <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                            {{ __('18') }}
                        </th>
                        <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                            {{ __('19') }}
                        </th>
                        <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                            {{ __('20') }}
                        </th>
                        <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                            {{ __('21') }}
                        </th>
                        <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                            {{ __('22') }}
                        </th>
                        <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                            {{ __('23') }}
                        </th>
                        <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                            {{ __('24') }}
                        </th>
                        <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                            {{ __('25') }}
                        </th>
                        <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                            {{ __('26') }}
                        </th>
                        <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                            {{ __('27') }}
                        </th>
                    @else
                        <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                            {{ __('17') }}
                        </th>
                        <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                            {{ __('18') }}
                        </th>
                        <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                            {{ __('19') }}
                        </th>
                        <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                            {{ __('20') }}
                        </th>
                        <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                            {{ __('21') }}
                        </th>
                        <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                            {{ __('22') }}
                        </th>
                        <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                            {{ __('23') }}
                        </th>
                        <th class="table-cell w-auto h-auto px-1 py-1.5 m-0 border border-solid border-black/[0.87] subtitle-2 text-black/[0.87] text-center align-middle whitespace-normal">
                            {{ __('24') }}
                        </th>
                    @endif
                </tr>
            </thead>

            <tbody class="table-row-group">
                @foreach($assets as $asset)
                    <tr class="table-row text-inherit align-middle outline-none relative *:first:border-t *:last:border-b">
                        <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-center align-top whitespace-normal">
                            {{ $loop->iteration }}
                        </td>
                        <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-left align-top whitespace-normal">
                            {{ $asset->code }}
                        </td>
                        <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-left align-top whitespace-normal">
                            {{ $asset->name }}
                        </td>
                        <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-left align-top whitespace-normal">
                            {{ $asset->category?->name }}
                        </td>
                        <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-left align-top whitespace-normal">
                            {{ $asset->brand?->name }}
                        </td>
                        <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-left align-top whitespace-normal">
                            {{ $asset->type }}
                        </td>
                        <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-left align-top whitespace-normal">
                            {{ $asset->manufacturer }}
                        </td>
                        <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-left align-top whitespace-normal">
                            {{ $asset->serial_number }}
                        </td>
                        <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-left align-top whitespace-normal">
                            {{ $asset->production_year }}
                        </td>
                        <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-left align-top whitespace-normal">
                            {{ $asset->description }}
                        </td>
                        <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-left align-top whitespace-normal">
                            {{ $asset->purchase_date }}
                        </td>
                        <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-left align-top whitespace-normal">
                            {{ $asset->distributor?->name }}
                        </td>
                        <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-left align-top whitespace-normal">
                            {{ $asset->invoice_number }}
                        </td>
                        <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-left align-top whitespace-normal">
                            {{ $asset->qty }}
                        </td>
                        <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-left align-top whitespace-normal">
                            {{ $asset->unit_price }}
                        </td>
                        <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-left align-top whitespace-normal">
                            {{ $asset->total_price }}
                        </td>

                        @if($status->value === App\Enums\StatusTypeEnum::Inactive->value)
                            <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-left align-top whitespace-normal">
                                {{ $asset->assetArchive?->inactive_date }}
                            </td>
                            <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-left align-top whitespace-normal">
                                {{ $asset->assetArchive?->reason->label() }}
                            </td>
                            <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-left align-top whitespace-normal">
                                {{ $asset->assetArchive?->notes }}
                            </td>
                        @endif

                        <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-left align-top whitespace-normal">
                            {{ $asset->latestHistory?->date_from }}
                        </td>
                        <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-left align-top whitespace-normal">
                            {{ $asset->latestHistory?->responsiblePerson?->name }}
                        </td>
                        <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-left align-top whitespace-normal">
                            {{ $asset->latestHistory?->location?->name }}
                        </td>
                        <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-left align-top whitespace-normal">
                            {{ $asset->latestHistory?->qty }}
                        </td>
                        <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-left align-top whitespace-normal">
                            {{ $asset->latestHistory?->condition_percentage }}
                        </td>
                        <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-left align-top whitespace-normal">
                            {{ $asset->latestHistory?->completeness_percentage }}
                        </td>
                        <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-left align-top whitespace-normal">
                            {{ $asset->latestHistory?->notes }}
                        </td>
                        <td class="table-cell w-auto h-auto px-1 py-1.5 m-0 border-x border-solid border-black/[0.87] body-2 text-black/[0.87] text-left align-top whitespace-normal">
                            {{ $asset->notes }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>

</html>
