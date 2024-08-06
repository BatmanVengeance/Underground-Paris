const { execSync } = require('child_process');
const fs = require('fs');

const commitMessage = execSync('git log -1 --pretty=%B').toString().trim();
const date = new Date().toISOString().split('T')[0];
const changelogPath = 'CHANGELOG.md';

if (commitMessage) {
    const changelogContent = fs.readFileSync(changelogPath, 'utf8');
    const newEntry = `## Version ${date}\n- ${commitMessage}\n`;
    const updatedContent = changelogContent.replace(
        /(## Version [0-9]{4}-[0-9]{2}-[0-9]{2}\n)/,
        `$1\n${newEntry}`
    );
    fs.writeFileSync(changelogPath, updatedContent);
}
