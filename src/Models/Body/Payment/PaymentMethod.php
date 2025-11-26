<?php

namespace DazzaDev\DgiiJsonGenerator\Models\Body\Payment;

use DazzaDev\DgiiJsonGenerator\Models\Base\BaseTypeModel;

class PaymentMethod extends BaseTypeModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
