<?php

namespace DazzaDev\DgiiJsonGenerator\Builders;

use DazzaDev\DgiiJsonGenerator\Models\DebitNote;

class DebitNoteBuilder extends BaseDocumentBuilder
{
    /**
     * Create document instance
     */
    protected function createDocument(): DebitNote
    {
        return new DebitNote($this->documentData);
    }

    /**
     * Get document type for debit note
     */
    protected function getDocumentType(): string
    {
        return 'debit-note';
    }

    /**
     * Get the debit note instance
     */
    public function getDebitNote(): DebitNote
    {
        return $this->getDocument();
    }
}
