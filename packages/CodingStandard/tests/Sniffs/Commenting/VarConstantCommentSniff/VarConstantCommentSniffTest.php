<?php declare(strict_types=1);

namespace Symplify\CodingStandard\Tests\Sniffs\Commenting\VarConstantCommentSniff;

use Symplify\CodingStandard\Sniffs\Commenting\VarConstantCommentSniff;
use Symplify\EasyCodingStandardTester\Testing\AbstractCheckerTestCase;

final class VarConstantCommentSniffTest extends AbstractCheckerTestCase
{
    public function test(): void
    {
        $this->doTestFiles([
            __DIR__ . '/Fixture/wrong.php.inc',
            __DIR__ . '/Fixture/wrong2.php.inc',
            __DIR__ . '/Fixture/wrong3.php.inc',
            __DIR__ . '/Fixture/correct.php.inc',
            __DIR__ . '/Fixture/correct2.php.inc',
        ]);
    }

    protected function getCheckerClass(): string
    {
        return VarConstantCommentSniff::class;
    }
}
