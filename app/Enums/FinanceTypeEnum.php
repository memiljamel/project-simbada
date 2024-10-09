<?php

namespace App\Enums;

enum FinanceTypeEnum: string
{
    /**
     * define the type of feedback as income.
     */
    case Income = 'income';

    /**
     * define the type of feedback as expense.
     */
    case Expense = 'expense';

    /**
     * Get the label for the finance type enum.
     */
    public function label(): string
    {
        return match ($this) {
            FinanceTypeEnum::Income => __('Income'),
            FinanceTypeEnum::Expense => __('Expense'),
        };
    }
}
