<?php declare(strict_types=1);

namespace Symplify\MonorepoBuilder\Release\ReleaseWorker;

use PharIo\Version\Version;

final class SetNextMutualDependenciesReleaseWorker extends AbstractMutualDependencyReleaseWorker
{
    public function getPriority(): int
    {
        return 200;
    }

    public function work(Version $version): void
    {
        $versionInString = $this->utils->getRequiredNextFormat($version);

        $rootComposerJson = $this->composerJsonProvider->getRootJson();

        // @todo resolve better for only found packages
        // see https://github.com/Symplify/Symplify/pull/1037/files
        [$vendor,] = explode('/', $rootComposerJson['name']);

        $this->interdependencyUpdater->updateFileInfosWithVendorAndVersion(
            $this->composerJsonProvider->getPackagesFileInfos(),
            $vendor,
            $versionInString
        );
    }

    public function getDescription(): string
    {
        return 'Set packages mutual dependencies to alias of dev version';
    }
}
