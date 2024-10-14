<style>
    * {
        margin: 0;
    }

    header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 16px;
        width: 100%;
        height: auto;
        padding: 0 16px;
        margin: 0;
        font-size: 12px;
        color: rgba(0, 0, 0, 0.87);
    }
</style>

<header>
    <div>{{ now() }}</div>
    <div>{{ $asset->name }}</div>
</header>
