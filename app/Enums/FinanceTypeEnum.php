<?php

namespace App\Enums;

enum FinanceTypeEnum: string
{
    /**
     * define the type of feedback as income.
     */
    case INCOME = 'income';

    /**
     * define the type of feedback as expense.
     */
    case EXPENSE = 'expense';

    /**
     * Get the label for the finance type enum.
     */
    public function label(): string
    {
        return match ($this) {
            FinanceTypeEnum::INCOME => __('Income'),
            FinanceTypeEnum::EXPENSE => __('Expense'),
        };
    }
}
