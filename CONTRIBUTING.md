## Contributing Guidelines

We welcome and appreciate contributions from the open-source community! Whether you're fixing bugs, improving documentation, or adding new features, your help makes this project better for everyone.

### Getting Started

1. **Familiarize Yourself**:
   - Read the [README](README.md) to understand the project
   - Review open [Issues](https://github.com/Kamta-Rawlings/Intern_Blog/issues) and [Pull Requests](https://github.com/Kamta-Rawlings/Intern_Blog/pulls)
   - Check the [Project Board](https://github.com/Kamta-Rawlings/Intern_Blog/projects) for ongoing work

2. **Setup Development Environment**:
   - Follow the [Installation Guide](#installation) in the README
   - Ensure all tests pass with `php artisan test`
   - Verify your code follows our [Style Guidelines](#code-style)

### Contribution Workflow

1. **Find an Issue or Propose a Change**:
   - Choose an existing issue from our [issue tracker](https://github.com/Kamta-Rawlings/Intern_Blog/issues)
   - If proposing something new, first open an issue to discuss it with maintainers

2. **Fork the Repository**:
   ```bash
   git clone https://github.com/yourusername/Intern_Blog.git
   cd blog-website
   git remote add upstream https://github.com/Kamta-Rawlings/Intern_Blog.git
   ```

3. **Create a Feature Branch**:
   ```bash
   git checkout -b feature/your-feature-name
   ```
   - Use descriptive branch names (e.g., `fix/header-bug` or `feat/user-profiles`)

4. **Make Your Changes**:
   - Follow our [coding standards](#code-style)
   - Write clear, concise commit messages
   - Keep changes focused - one feature/bugfix per pull request
   - Update documentation when necessary

5. **Test Your Changes**:
   ```bash
   php artisan test
   npm run test
   ```
   - Add new tests for your changes
   - Ensure all existing tests pass

6. **Push Your Changes**:
   ```bash
   git push origin feature/your-feature-name
   ```

7. **Open a Pull Request**:
   - Target the `main` branch
   - Use our [Pull Request Template](#pull-request-template)
   - Describe changes clearly and reference related issues
   - Include screenshots for UI changes

### Code Style Guidelines

- **PHP**: Follow [PSR-12](https://www.php-fig.org/psr/psr-12/) standards
- **JavaScript**: Follow [Airbnb JavaScript Style Guide](https://github.com/airbnb/javascript)
- **Blade Templates**:
  - Use 4 spaces for indentation
  - Keep logic minimal in views
- **CSS/Sass**: Follow [BEM methodology](http://getbem.com/)

### Commit Message Convention

We follow [Conventional Commits](https://www.conventionalcommits.org):
```
<type>[optional scope]: <description>

[optional body]

[optional footer]
```

Common types:
- `feat`: New feature
- `fix`: Bug fix
- `docs`: Documentation changes
- `style`: Code style/formatting
- `refactor`: Code changes that neither fixes a bug nor adds a feature
- `test`: Adding missing tests or correcting existing tests
- `chore`: Maintenance tasks

Example:
```
feat(comments): add nested replies functionality

- Implement recursive comment rendering
- Add database migration for parent_id
- Update comment controller

Closes #123
```

### Pull Request Process

1. Ensure your PR:
   - Has a clear title and description
   - References related issues
   - Includes necessary tests
   - Updates documentation if needed
   - Passes all CI checks

2. A maintainer will:
   - Review your PR within 3-5 business days
   - Provide feedback or request changes
   - Merge when approved

3. After merging:
   - Your changes will be included in the next release
   - You'll be added to the contributors list

### Reporting Issues

When opening an issue:
- Use a clear, descriptive title
- Describe the problem with steps to reproduce
- Include screenshots if applicable
- Specify your environment (OS, browser, PHP version, etc.)
- Use our [Issue Template](#issue-template)

### Community Standards

We follow the [Contributor Covenant Code of Conduct](CODE_OF_CONDUCT.md). Please:
- Be respectful and inclusive
- Assume positive intent
- Keep discussions constructive
- Help maintain a welcoming environment

### Need Help?

Join our [community chat](https://tecnovice.com) or reach out to maintainers:
- @Kamta-Rawlings
- @miclemabasie
- @achirihilary
- @israel

