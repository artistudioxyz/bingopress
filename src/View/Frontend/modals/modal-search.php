<div id="bingopress-modal-search" class="hidden modal" data-title="Search" data-icon="fas fa-search">
    <div class="w-full overflow-hidden">
        <div class="flex flex-wrap item-center relative py-6">
            <form method="GET" action="<?php echo esc_url( home_url() ) ?>" class="w-full">
                <input type="text" id="quicksearch" name="s" class="w-full text-xl font-medium"
                    placeholder="<?php echo esc_attr__('Keywords ...','bingopress') ?>">
            </form>
        </div>
    </div>
</div>